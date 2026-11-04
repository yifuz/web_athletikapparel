<?php
/**
 * Product Showcase 建页核心：后台与 CLI 共用；加载文件本身不写数据库。
 *
 * @package myathletik-child
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/** Read-only route, ownership and optional media preflight. */
function myathletik_product_showcase_prepare( $check_media = true ) {
	$hub      = myathletik_product_showcase_data();
	$products = myathletik_product_example_data();
	// 分享图 metadata 不经过 HTML 图片缓冲，直接保存对应 uploads URL。
	$social_image_url = static function ( $url ) {
		$theme_prefix = trailingslashit( get_stylesheet_directory_uri() ) . 'assets/images/';
		return 0 === strpos( $url, $theme_prefix )
			? trailingslashit( myathletik_images_uri() ) . substr( $url, strlen( $theme_prefix ) )
			: $url;
	};
	$schema   = array(
		'' => array(
			'path'        => $hub['slug'],
			'slug'        => $hub['slug'],
			'title'       => $hub['title'],
			'seo_title'   => $hub['seo_title'],
			'description' => $hub['meta_description'],
			'social_image'=> $social_image_url( $hub['social_image'] ),
			'content'     => $hub['title'] . "\n\n" . $hub['meta_description'],
		),
	);
	foreach ( $products as $key => $product ) {
		$schema[ $key ] = array(
			'path'        => $hub['slug'] . '/' . $product['slug'],
			'slug'        => $product['slug'],
			'title'       => $product['title'],
			'seo_title'   => $product['seo_title'],
			'description' => $product['meta_description'],
			'social_image'=> $social_image_url( $product['social_image'] ),
			'content'     => $product['title'] . "\n\n" . $product['intro'],
		);
	}

	// 先检查全部路径与归属；任何冲突都应在第一次数据库写入之前停止。
	$owned_pages = get_posts(
		array(
			'post_type'      => 'page',
			'post_status'    => array( 'publish', 'draft', 'pending', 'private', 'future', 'trash' ),
			'posts_per_page' => -1,
			'meta_query'     => array(
				'relation' => 'OR',
				array( 'key' => '_ma_product_showcase', 'value' => '1' ),
				array( 'key' => '_ma_product_showcase_preview', 'value' => '1' ),
			),
		)
	);
	$plan = array();
	foreach ( $schema as $key => $definition ) {
		$existing = get_page_by_path( $definition['path'], OBJECT, 'page' );
		if ( $existing ) {
			$is_owned = '1' === get_post_meta( $existing->ID, '_ma_product_showcase', true )
				|| '1' === get_post_meta( $existing->ID, '_ma_product_showcase_preview', true );
			if ( ! $is_owned || $key !== get_post_meta( $existing->ID, '_ma_product_example_key', true ) ) {
				return new WP_Error( 'showcase_preflight', 'Route occupied by another page: /' . $definition['path'] . '/. Nothing changed.' );
			}
			if ( ! in_array( $existing->post_status, array( 'draft', 'pending', 'publish' ), true ) || $existing->post_password ) {
				return new WP_Error( 'showcase_preflight', 'Resolve the protected, private, scheduled or trashed page manually: ' . $existing->ID . '. Nothing changed.' );
			}
		}
		foreach ( $owned_pages as $owned_page ) {
			if ( $key === get_post_meta( $owned_page->ID, '_ma_product_example_key', true )
				&& ( ! $existing || $owned_page->ID !== $existing->ID ) ) {
				return new WP_Error( 'showcase_preflight', 'Another managed page already uses this product key: ' . $owned_page->ID . '. Check its URL; no duplicate or redirect created.' );
			}
		}
		$plan[ $key ] = array(
			'definition' => $definition,
			'existing'   => $existing,
			'legacy'     => $existing && '1' === get_post_meta( $existing->ID, '_ma_product_showcase_preview', true ),
		);
	}

	// 新发布必须先备齐 uploads；只读检查，不替用户上传或生成媒体。
	$media_count = 0;
	if ( $check_media ) {
		$media_urls = array_column( $schema, 'social_image' );
		foreach ( $products as $product ) {
			foreach ( $product['media']['images'] as $image ) {
				$media_urls[] = $image['src'];
				$media_urls[] = $image['thumbnail'];
			}
			$media_urls[] = $product['media']['video']['src'];
			$media_urls[] = $product['media']['video']['poster'];
		}
		$media_prefixes = array(
			trailingslashit( get_stylesheet_directory_uri() ) . 'assets/images/',
			trailingslashit( myathletik_images_uri() ),
		);
		$media_urls = array_unique( $media_urls );
		$media_count = count( $media_urls );
		foreach ( $media_urls as $media_url ) {
			$relative_path = null;
			foreach ( $media_prefixes as $prefix ) {
				if ( 0 === strpos( $media_url, $prefix ) ) {
					$relative_path = rawurldecode( substr( $media_url, strlen( $prefix ) ) );
					break;
				}
			}
			if ( null === $relative_path || preg_match( '~(^|[\\\\/])\.\.([\\\\/]|$)|[?#]~', $relative_path ) ) {
				return new WP_Error( 'showcase_preflight', 'Unsupported media location: ' . $media_url . '. Nothing changed.' );
			}
			$media_file = trailingslashit( myathletik_images_dir() ) . $relative_path;
			if ( ! is_readable( $media_file ) || ! is_file( $media_file ) || 0 === filesize( $media_file ) ) {
				return new WP_Error( 'showcase_preflight', 'Required media is missing or empty: ' . $media_file . '. Nothing changed.' );
			}
		}
	}

	return array( 'plan' => $plan, 'media_count' => $media_count );
}

/**
 * Explicit setup only. Web callers must check permissions, method and nonce.
 * Keep CLI draft preparation and administrator publishing on the same path.
 */
function myathletik_product_showcase_setup( $publish = false ) {
	$lock_key = 'myathletik_product_showcase_setup_lock';
	if ( ! add_option( $lock_key, time(), '', false ) ) {
		return new WP_Error( 'showcase_busy', 'Another Product Showcase setup is running. Please retry shortly. If this persists, ask the maintainer to check the setup lock.' );
	}
	try {
		$prepared = myathletik_product_showcase_prepare( $publish );
		if ( is_wp_error( $prepared ) ) {
			return $prepared;
		}
		$plan    = $prepared['plan'];
		$hub_id  = 0;
		$changed = false;
		$pages   = array();
		foreach ( $plan as $key => $item ) {
			$definition = $item['definition'];
			$existing   = $item['existing'];
			$legacy     = $item['legacy'];
			$parent_id  = '' === $key ? 0 : $hub_id;
			$post       = array();
			if ( ! $existing ) {
				$post = array(
					'post_type'    => 'page',
					'post_status'  => $publish ? 'publish' : 'draft',
					'post_name'    => $definition['slug'],
					'post_title'   => $definition['title'],
					'post_parent'  => $parent_id,
					'post_content' => $definition['content'],
				);
			} else {
				if ( $publish && 'publish' !== $existing->post_status ) {
					$post['post_status'] = 'publish';
				}
				// 正式记录的正文及标题不覆盖；只迁移已知旧 Demo 的占位正文。
				if ( $legacy ) {
					if ( $existing->post_title !== $definition['title'] ) {
						$post['post_title'] = $definition['title'];
					}
					if ( '[Local-only Product Showcase review rendered by the child theme. Not a production release.]' === $existing->post_content || '' === trim( $existing->post_content ) ) {
						$post['post_content'] = $definition['content'];
					}
				}
			}

			// 没有变化就不调用 wp_update_post，避免凭空刷新修改时间。
			if ( $post ) {
				if ( $existing ) {
					$post['ID'] = $existing->ID;
					$id = wp_update_post( wp_slash( $post ), true );
				} else {
					$id = wp_insert_post( wp_slash( $post ), true );
				}
				if ( is_wp_error( $id ) ) {
					return new WP_Error( 'showcase_write', $id->get_error_message(), array( 'pages' => $pages ) );
				}
				$changed = true;
			} else {
				$id = $existing->ID;
			}
			if ( '' === $key ) {
				$hub_id = $id;
			}

			$metadata = array(
				'_ma_product_showcase'   => '1',
				'_ma_product_example_key'=> $key,
				'_generate_sidebar_layout' => 'no-sidebar',
			);
			$defaults = array(
				'rank_math_title'          => $definition['seo_title'],
				'rank_math_description'    => $definition['description'],
				'rank_math_robots'         => array( 'index', 'follow' ),
				'rank_math_facebook_image' => $definition['social_image'],
				'rank_math_twitter_use_facebook' => 'on',
			);
			foreach ( $defaults as $meta_key => $value ) {
				if ( ! $existing || $legacy || ! metadata_exists( 'post', $id, $meta_key ) ) {
					$metadata[ $meta_key ] = $value;
				}
			}
			foreach ( $metadata as $meta_key => $value ) {
				if ( ! metadata_exists( 'post', $id, $meta_key ) || get_post_meta( $id, $meta_key, true ) !== $value ) {
					update_post_meta( $id, $meta_key, wp_slash( $value ) );
					if ( ! metadata_exists( 'post', $id, $meta_key ) || get_post_meta( $id, $meta_key, true ) !== $value ) {
						return new WP_Error( 'showcase_write', 'Could not save page settings for page ' . $id . '. Some records may already have been prepared; review before retrying.', array( 'pages' => $pages ) );
					}
					$changed = true;
				}
			}
			if ( $legacy ) {
				delete_post_meta( $id, '_ma_product_showcase_preview' );
				if ( metadata_exists( 'post', $id, '_ma_product_showcase_preview' ) ) {
					return new WP_Error( 'showcase_write', 'Could not clear the old preview setting for page ' . $id . '. Review the page before retrying.', array( 'pages' => $pages ) );
				}
				$changed = true;
			}
			$pages[] = array( 'id' => $id, 'status' => get_post_status( $id ), 'url' => get_permalink( $id ) );
		}

		if ( $changed && class_exists( '\RankMath\Sitemap\Cache' ) ) {
			\RankMath\Sitemap\Cache::invalidate_storage();
		}
		return array( 'changed' => $changed, 'pages' => $pages );
	} finally {
		delete_option( $lock_key );
	}
}
