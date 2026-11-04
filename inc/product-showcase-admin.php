<?php
/**
 * Product Showcase 的管理员建页入口；只有显式提交才写入页面记录。
 *
 * @package myathletik-child
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function myathletik_product_showcase_admin_can_manage() {
	return current_user_can( 'manage_options' ) && current_user_can( 'publish_pages' );
}

add_action( 'admin_menu', function () {
	if ( ! myathletik_product_showcase_admin_can_manage() ) {
		return;
	}
	add_management_page(
		'Product Showcase',
		'Product Showcase',
		'manage_options',
		'myathletik-product-showcase',
		'myathletik_product_showcase_admin_page'
	);
} );

/** 页面检查失败时也保留目标页面清单，便于定位冲突。 */
function myathletik_product_showcase_admin_rows() {
	$hub  = myathletik_product_showcase_data();
	$rows = array( array( 'title' => $hub['title'], 'path' => $hub['slug'] ) );
	foreach ( myathletik_product_example_data() as $product ) {
		$rows[] = array( 'title' => $product['title'], 'path' => $hub['slug'] . '/' . $product['slug'] );
	}
	return $rows;
}

function myathletik_product_showcase_admin_page() {
	if ( ! myathletik_product_showcase_admin_can_manage() ) {
		wp_die( esc_html( '你没有管理和发布这些页面的权限。' ), '', array( 'response' => 403 ) );
	}
	$result_key = 'ma_showcase_result_' . get_current_user_id();
	$result     = get_transient( $result_key );
	if ( false !== $result ) {
		delete_transient( $result_key );
	}
	$check = myathletik_product_showcase_prepare( true );
	$statuses = array(
		'publish' => '已发布',
		'draft'   => '草稿',
		'pending' => '待审核',
		'private' => '私密',
		'future'  => '定时发布',
		'trash'   => '回收站',
	);
	?>
	<div class="wrap">
		<h1>Product Showcase</h1>
		<p>检查已上传的图片、视频和页面记录，再创建并发布展示总览及已审核的产品详情页。</p>
		<p><strong>当前站点：</strong> <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( home_url( '/' ) ); ?></a>
			&emsp;<strong>环境：</strong> <code><?php echo esc_html( wp_get_environment_type() ); ?></code></p>
		<?php if ( 'production' !== wp_get_environment_type() ) : ?>
			<div class="notice notice-info inline"><p>当前是本地或测试环境。本次操作只影响当前站点，展示页仍保持 noindex，不会同步到生产站。</p></div>
		<?php elseif ( ! get_option( 'blog_public' ) ) : ?>
			<div class="notice notice-warning inline"><p>当前站点关闭了搜索引擎可见性。创建页面不会自动修改该设置，上线后仍需检查索引设置。</p></div>
		<?php endif; ?>
		<?php if ( is_array( $result ) && isset( $result['message'], $result['success'] ) ) : ?>
			<div class="notice <?php echo $result['success'] ? 'notice-success' : 'notice-error'; ?> inline">
				<p><?php echo esc_html( $result['message'] ); ?></p>
				<?php if ( ! empty( $result['pages'] ) && is_array( $result['pages'] ) ) : ?>
					<ul>
						<?php foreach ( $result['pages'] as $page ) : ?>
							<li><a href="<?php echo esc_url( $page['url'] ); ?>"><?php echo esc_html( $page['url'] ); ?></a> — <?php echo esc_html( isset( $statuses[ $page['status'] ] ) ? $statuses[ $page['status'] ] : $page['status'] ); ?></li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		<h2>待发布页面</h2>
		<table class="widefat striped">
			<thead><tr><th scope="col">页面</th><th scope="col">网址路径</th><th scope="col">当前状态</th></tr></thead>
			<tbody>
				<?php foreach ( myathletik_product_showcase_admin_rows() as $row ) : ?>
					<?php $existing = get_page_by_path( $row['path'], OBJECT, 'page' ); ?>
					<tr>
						<td><?php echo esc_html( $row['title'] ); ?></td>
						<td><code><?php echo esc_html( '/' . $row['path'] . '/' ); ?></code></td>
						<td><?php echo esc_html( $existing ? ( isset( $statuses[ $existing->post_status ] ) ? $statuses[ $existing->post_status ] : $existing->post_status ) : '尚未创建' ); ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<h2>发布前检查</h2>
		<?php if ( is_wp_error( $check ) ) : ?>
			<div class="notice notice-error inline">
				<p><strong>检查未通过，暂不能发布。</strong> 请先解决下列问题，再刷新本页重试。</p>
				<?php foreach ( $check->get_error_messages() as $message ) : ?>
					<p><?php echo esc_html( $message ); ?></p>
				<?php endforeach; ?>
			</div>
		<?php else : ?>
			<div class="notice notice-success inline"><p><?php echo esc_html( sprintf( '检查通过：页面路径与归属正常，所需 %d 个媒体文件均已就绪。', $check['media_count'] ) ); ?></p></div>
		<?php endif; ?>
		<p>点击后会建立缺少的页面记录、关联展示模板并发布。已有正式页面的正文、标题及自定义 SEO 设置会保留；已完成的页面不会重复创建。发布后还需检查生产页面与索引设置。</p>
		<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
			<input type="hidden" name="action" value="myathletik_product_showcase_publish">
			<?php wp_nonce_field( 'myathletik_product_showcase_publish', '_ma_showcase_nonce' ); ?>
			<?php submit_button( '创建并发布展示页', 'primary', 'submit', true, is_wp_error( $check ) ? array( 'disabled' => 'disabled' ) : array() ); ?>
		</form>
	</div>
	<?php
}

add_action( 'admin_post_myathletik_product_showcase_publish', function () {
	if ( ! myathletik_product_showcase_admin_can_manage() ) {
		wp_die( esc_html( '你没有管理和发布这些页面的权限。' ), '', array( 'response' => 403 ) );
	}
	if ( ! isset( $_SERVER['REQUEST_METHOD'] ) || 'POST' !== $_SERVER['REQUEST_METHOD'] ) {
		wp_die( esc_html( '请通过 Product Showcase 页面上的发布按钮提交。' ), '', array( 'response' => 405 ) );
	}
	check_admin_referer( 'myathletik_product_showcase_publish', '_ma_showcase_nonce' );
	$result = myathletik_product_showcase_setup( true );
	$notice = array( 'success' => ! is_wp_error( $result ) );
	if ( is_wp_error( $result ) ) {
		$notice['message'] = $result->get_error_message();
	} else {
		$notice['message'] = $result['changed'] ? '展示页已创建或更新并发布。请打开下方页面检查展示效果。' : '展示页已是最新状态，没有重复创建或修改页面。';
		$notice['pages']   = $result['pages'];
	}
	set_transient( 'ma_showcase_result_' . get_current_user_id(), $notice, 5 * MINUTE_IN_SECONDS );
	wp_safe_redirect( admin_url( 'tools.php?page=myathletik-product-showcase' ) );
	exit;
} );
