<?php
/**
 * Technical article metadata shared by page templates, SEO and Schema.
 *
 * @package myathletik-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return the technical-guides hub metadata.
 *
 * @return array
 */
function myathletik_technical_guides_hub_data() {
	return array(
		'title'            => __( 'Technical Knitwear Guides', 'myathletik-child' ),
		'seo_title'        => __( 'Technical Knitwear Guides for Buyers | Athletik Clothing', 'myathletik-child' ),
		'meta_description' => __( 'Practical technical guides for cut-and-sew performance knitwear buyers, covering seam construction, tech packs, testing and OEM evaluation.', 'myathletik-child' ),
		'kicker'           => __( 'Buyer resource library', 'myathletik-child' ),
		'intro'            => __( 'Production guidance on seam construction, tech packs, testing and OEM evaluation for cut-and-sew performance knitwear.', 'myathletik-child' ),
		'scope'            => array(
			array(
				'title' => __( 'Construction decisions', 'myathletik-child' ),
				'copy'  => __( 'Compare stitch types, seam profiles, garment applications and approval criteria.', 'myathletik-child' ),
			),
			array(
				'title' => __( 'Tech pack preparation', 'myathletik-child' ),
				'copy'  => __( 'Define fabric, measurement, seam, testing and sample-approval requirements clearly.', 'myathletik-child' ),
			),
			array(
				'title' => __( 'OEM evaluation', 'myathletik-child' ),
				'copy'  => __( 'Review process ownership, production controls, traceability and project fit.', 'myathletik-child' ),
			),
		),
	);
}

/**
 * Return the technical article registry.
 *
 * Long-form body markup remains in a slug-specific content template. This
 * registry keeps page metadata, navigation, FAQs and references reusable by
 * the visible page and structured-data layer.
 *
 * @return array
 */
function myathletik_technical_article_data() {
	return array(
		'flatlock-vs-overlock-technical-knitwear' => array(
			'status'           => 'publish',
			'title'            => __( 'FLATLOCK vs OVERLOCK for Technical Knitwear', 'myathletik-child' ),
			'seo_title'        => __( 'FLATLOCK vs OVERLOCK for Technical Knitwear | Athletik', 'myathletik-child' ),
			'meta_description' => __( 'Compare FLATLOCK and OVERLOCK for technical knitwear: seam profile, 607/514 stitch references, garment applications, testing and tech pack callouts.', 'myathletik-child' ),
			'kicker'           => __( 'Technical construction guide', 'myathletik-child' ),
			'topic'            => __( 'Seam construction', 'myathletik-child' ),
			'summary'          => __( 'Compare seam profile, stitch types 607 and 514, garment applications, testing considerations and the seam information buyers should include in a tech pack.', 'myathletik-child' ),
			'intro'            => __( 'FLATLOCK reduces seam profile in high-contact areas; OVERLOCK provides efficient stretch assembly where an internal seam allowance is acceptable. Neither is universally better—the correct choice depends on seam position, fabric and testing.', 'myathletik-child' ),
			'reviewed_on'      => '2026-08-11',
			'featured_image'   => 'production/articles/flatlock-vs-overlock/yamato-flatlock-knitwear-poster.jpg',
			'featured_alt'     => __( 'Yamato FLATLOCK sewing operation for technical performance knitwear', 'myathletik-child' ),
			'toc'              => array(
				'what-is-flatlock'   => __( 'What is FLATLOCK construction?', 'myathletik-child' ),
				'what-is-overlock'   => __( 'What is OVERLOCK construction?', 'myathletik-child' ),
				'comparison'         => __( 'Practical comparison', 'myathletik-child' ),
				'when-flatlock'      => __( 'When to specify FLATLOCK', 'myathletik-child' ),
				'when-overlock'      => __( 'When OVERLOCK is appropriate', 'myathletik-child' ),
				'fabric-and-testing' => __( 'Fabric, thread and testing', 'myathletik-child' ),
				'activeseam'         => __( 'How ACTIVESEAM differs', 'myathletik-child' ),
				'tech-pack'          => __( 'Tech pack checklist', 'myathletik-child' ),
				'faq'                => __( 'Common buyer questions', 'myathletik-child' ),
			),
			'faq'              => array(
				array(
					'question' => __( 'Is FLATLOCK always better than OVERLOCK for a base layer?', 'myathletik-child' ),
					'answer'   => __( 'No. FLATLOCK is often preferred at high-contact, next-to-skin joins because of its low profile. OVERLOCK may still be suitable in other positions when the internal allowance does not create unwanted pressure or bulk. Many garments use more than one seam construction.', 'myathletik-child' ),
				),
				array(
					'question' => __( 'Is OVERLOCK unsuitable for performance apparel?', 'myathletik-child' ),
					'answer'   => __( 'No. Two-needle, four-thread OVERLOCK is used widely in stretch-knit assembly. Its performance depends on the fabric, thread, differential feed, tension, stitch setting and seam position. It should be judged through sampling and testing rather than by category label.', 'myathletik-child' ),
				),
				array(
					'question' => __( 'Can FLATLOCK be used on lightweight stretch fabric?', 'myathletik-child' ),
					'answer'   => __( 'Yes, but the setup must suit the fabric. Needle selection, thread, stitch density, seam width, feeding and tension all influence seam extension, puckering and edge stability. Approve the result on the actual production fabric.', 'myathletik-child' ),
				),
				array(
					'question' => __( 'Can ACTIVESEAM be called FLATLOCK?', 'myathletik-child' ),
					'answer'   => __( 'No. ACTIVESEAM is a named Merrow construction and platform. It may be selected for a similar low-profile application, but it should be identified separately in sourcing discussions and technical documents.', 'myathletik-child' ),
				),
			),
			'references'       => array(
				array(
					'label' => __( 'Yamato FD-62 flatseamer applications', 'myathletik-child' ),
					'url'   => 'https://www.yamato-sewing.com/en/product/flatseamer/fd-62dry/submodel/',
				),
				array(
					'label' => __( 'Yamato knit-garment OVERLOCK applications', 'myathletik-child' ),
					'url'   => 'https://www.yamato-sewing.com/en/product/item/tshirt1/',
				),
				array(
					'label' => __( 'Yamato VFK FLATLOCK specifications', 'myathletik-child' ),
					'url'   => 'https://www.yamato-sewing.com/en/product/flatseamer/vfk/specifications/',
				),
				array(
					'label' => __( 'Coats seam types and selection factors', 'myathletik-child' ),
					'url'   => 'https://www.coats.com/en-us/info-hub/seam-types/',
				),
				array(
					'label' => __( 'Coats soft and secure seams for activewear and intimates', 'myathletik-child' ),
					'url'   => 'https://www.coats.com/en/info-hub/about-soft-and-secure-seams-for-activewear-and-intimates/',
				),
				array(
					'label' => __( 'Merrow MB-4DFO ACTIVESEAM specifications', 'myathletik-child' ),
					'url'   => 'https://www.merrow.com/Sergers_and_Overlock_Sewing_Machines/mb4dfo',
				),
				array(
					'label' => __( 'ISO 4915 stitch-type classification', 'myathletik-child' ),
					'url'   => 'https://www.iso.org/standard/10932.html',
				),
			),
		),
	);
}

/**
 * Return one technical article record.
 *
 * @param string $slug Article page slug.
 * @return array|null
 */
function myathletik_get_technical_article_data( $slug ) {
	$articles = myathletik_technical_article_data();

	return isset( $articles[ $slug ] ) ? $articles[ $slug ] : null;
}

/**
 * Return only owner-approved, published technical articles.
 *
 * Draft briefs remain in docs and never appear on the public hub until their
 * registry record is explicitly marked publish.
 *
 * @return array
 */
function myathletik_get_published_technical_articles() {
	return array_filter(
		myathletik_technical_article_data(),
		static function ( $article ) {
			return isset( $article['status'] ) && 'publish' === $article['status'];
		}
	);
}
