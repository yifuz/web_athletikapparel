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
			'featured_width'   => 720,
			'featured_height'  => 1280,
			'article_section'  => __( 'Technical knitwear construction', 'myathletik-child' ),
			'about'            => array( 'FLATLOCK', 'OVERLOCK', 'ACTIVESEAM', 'Technical knitwear' ),
			'cta_kicker'       => __( 'Develop a technical knitwear program', 'myathletik-child' ),
			'cta_title'        => __( 'Review the seam map before sampling', 'myathletik-child' ),
			'cta_copy'         => __( 'Send the garment drawing or tech pack, fabric specification, intended use, order quantity and required testing so the construction can be reviewed against the actual program.', 'myathletik-child' ),
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
		'technical-knitwear-tech-pack-guide' => array(
			'status'           => 'publish',
			'title'            => __( 'What to Include in a Tech Pack for Technical Knitwear', 'myathletik-child' ),
			'seo_title'        => __( 'Technical Knitwear Tech Pack Guide | Athletik Clothing', 'myathletik-child' ),
			'meta_description' => __( 'Build a cut-and-sew technical knitwear tech pack with fabric specifications, seam maps, POMs, tolerances, testing requirements and approval stages.', 'myathletik-child' ),
			'kicker'           => __( 'Technical specification guide', 'myathletik-child' ),
			'topic'            => __( 'Tech pack development', 'myathletik-child' ),
			'summary'          => __( 'Define finished fabric, POMs, tolerances, seam maps, components, testing and sample approvals in one controlled production reference.', 'myathletik-child' ),
			'intro'            => __( 'A production-ready tech pack should control the finished fabric, measurements, seam map, components, testing and approvals—not only the sketch and size chart.', 'myathletik-child' ),
			'reviewed_on'      => '2026-08-11',
			'featured_image'   => 'production/hero_bento_b.jpg',
			'featured_alt'     => __( 'Technical sewing machine operator producing a knitted garment in the Athletik workshop', 'myathletik-child' ),
			'featured_width'   => 800,
			'featured_height'  => 800,
			'article_section'  => __( 'Technical knitwear product development', 'myathletik-child' ),
			'about'            => array( 'Technical knitwear', 'Tech pack', 'Seam map', 'Garment testing' ),
			'cta_kicker'       => __( 'Prepare a production-ready specification', 'myathletik-child' ),
			'cta_title'        => __( 'Review the tech pack before sampling', 'myathletik-child' ),
			'cta_copy'         => __( 'Send the current garment drawing, finished-fabric specification, measurement table, seam map, order quantity and testing requirements for a development review.', 'myathletik-child' ),
			'toc'              => array(
				'document-control'    => __( 'Document control and intended use', 'myathletik-child' ),
				'technical-flats'     => __( 'Technical flats and callouts', 'myathletik-child' ),
				'pom-and-tolerances'  => __( 'POMs and tolerances', 'myathletik-child' ),
				'finished-fabric'     => __( 'Finished-fabric specification', 'myathletik-child' ),
				'seam-map'            => __( 'Seam map and stitch construction', 'myathletik-child' ),
				'trims-and-components' => __( 'Trims and component compatibility', 'myathletik-child' ),
				'testing'             => __( 'Testing methods and criteria', 'myathletik-child' ),
				'sample-approvals'    => __( 'Sample stages and approvals', 'myathletik-child' ),
				'handoff-checklist'   => __( 'Final handoff checklist', 'myathletik-child' ),
				'faq'                 => __( 'Common buyer questions', 'myathletik-child' ),
			),
			'faq'              => array(
				array(
					'question' => __( 'Does the buyer need to specify every machine setting?', 'myathletik-child' ),
					'answer'   => __( 'No. The buyer should define the required construction, location, appearance and performance. The manufacturer can propose needle, thread, tension, differential feed and other settings during development, then record and control the approved result for bulk production.', 'myathletik-child' ),
				),
				array(
					'question' => __( 'Can one tech pack cover several fabrics?', 'myathletik-child' ),
					'answer'   => __( 'Only if the differences are clearly controlled. A change in fabric weight, stretch, recovery, thickness or edge stability may require different pattern, seam or testing decisions. Record material-specific requirements rather than assuming one approval applies to every fabric option.', 'myathletik-child' ),
				),
				array(
					'question' => __( 'Should testing values be supplied by the manufacturer?', 'myathletik-child' ),
					'answer'   => __( 'The manufacturer may recommend methods or achievable values, but the buyer should approve the final acceptance criteria for the intended product and market. Marketing claims and regulatory requirements remain the responsibility of the parties using those claims.', 'myathletik-child' ),
				),
				array(
					'question' => __( 'What causes the most avoidable sampling delays?', 'myathletik-child' ),
					'answer'   => __( 'Common causes include missing finished-fabric details, unclear measurement points, conflicting drawings and tables, unspecified seam locations, artwork without placement dimensions, and comments that are not incorporated into the next controlled revision.', 'myathletik-child' ),
				),
			),
			'references'       => array(
				array(
					'label' => __( 'ASTM D2594/D2594M-21 stretch and growth of knitted fabrics', 'myathletik-child' ),
					'url'   => 'https://store.astm.org/d2594_d2594m-21.html',
				),
				array(
					'label' => __( 'AATCC TM135-2025 dimensional changes after home laundering', 'myathletik-child' ),
					'url'   => 'https://members.aatcc.org/store/tm135/543/',
				),
				array(
					'label' => __( 'ISO 3759 preparation, marking and measurement for dimensional-change tests', 'myathletik-child' ),
					'url'   => 'https://www.iso.org/standard/57309.html',
				),
				array(
					'label' => __( 'ISO 5077 determination of dimensional change after washing and drying', 'myathletik-child' ),
					'url'   => 'https://www.iso.org/standard/41877.html',
				),
			),
		),
		'evaluate-technical-knitwear-oem' => array(
			'status'           => 'publish',
			'title'            => __( 'How to Evaluate a Vertically Integrated Knitwear OEM', 'myathletik-child' ),
			'seo_title'        => __( 'How to Evaluate a Technical Knitwear OEM | Athletik', 'myathletik-child' ),
			'meta_description' => __( 'Evaluate a cut-and-sew knitwear OEM by checking process ownership, fabric controls, seam capability, testing, traceability, capacity and approvals.', 'myathletik-child' ),
			'kicker'           => __( 'OEM evaluation guide', 'myathletik-child' ),
			'topic'            => __( 'Supplier evaluation', 'myathletik-child' ),
			'summary'          => __( 'Verify legal and production scope, process ownership, fabric controls, technical capability, quality evidence, traceability and project-level capacity.', 'myathletik-child' ),
			'intro'            => __( 'Evaluate the legal and production scope, process ownership, fabric controls, technical sewing, quality evidence, traceability, capacity fit and commercial assumptions before approving an OEM.', 'myathletik-child' ),
			'reviewed_on'      => '2026-08-11',
			'featured_image'   => 'production/车间.png',
			'featured_alt'     => __( 'Athletik technical knitwear garment production floor in Zhangjiagang, Jiangsu', 'myathletik-child' ),
			'featured_width'   => 1536,
			'featured_height'  => 1024,
			'article_section'  => __( 'Technical knitwear supplier evaluation', 'myathletik-child' ),
			'about'            => array( 'Vertically integrated OEM', 'Technical knitwear', 'Supplier evaluation', 'Traceability' ),
			'cta_kicker'       => __( 'Evaluate an OEM against the actual program', 'myathletik-child' ),
			'cta_title'        => __( 'Start with a controlled project brief', 'myathletik-child' ),
			'cta_copy'         => __( 'Send the intended product, finished-fabric specification, seam requirements, order quantity, target market, testing and delivery requirements for a feasibility review.', 'myathletik-child' ),
			'toc'              => array(
				'product-and-risk'    => __( 'Define the product and risk', 'myathletik-child' ),
				'legal-identity'      => __( 'Verify legal identity and location', 'myathletik-child' ),
				'process-map'         => __( 'Map vertical integration', 'myathletik-child' ),
				'technical-capability' => __( 'Test technical capability', 'myathletik-child' ),
				'fabric-control'      => __( 'Audit fabric and lot control', 'myathletik-child' ),
				'development-system'  => __( 'Review development and approvals', 'myathletik-child' ),
				'capacity'            => __( 'Verify project-level capacity', 'myathletik-child' ),
				'quality-data'        => __( 'Examine quality data', 'myathletik-child' ),
				'traceability'        => __( 'Check traceability and certification', 'myathletik-child' ),
				'quotation'           => __( 'Normalize the quotation', 'myathletik-child' ),
				'controlled-pilot'    => __( 'Use a controlled pilot', 'myathletik-child' ),
				'red-flags'           => __( 'Red flags requiring clarification', 'myathletik-child' ),
				'faq'                 => __( 'Common buyer questions', 'myathletik-child' ),
			),
			'faq'              => array(
				array(
					'question' => __( 'Does vertically integrated mean every process must be owned?', 'myathletik-child' ),
					'answer'   => __( 'No. It should mean the relevant process relationships and controls are clear. Owned, affiliated, subcontracted, nominated and purchased stages should be identified so the buyer can evaluate technical control and risk.', 'myathletik-child' ),
				),
				array(
					'question' => __( 'Is a factory audit enough?', 'myathletik-child' ),
					'answer'   => __( 'No. An audit may cover a defined social, quality, security or environmental scope at a specific site and time. It does not automatically verify product fit, technical seam capability, fabric performance, capacity allocation or every certification claim.', 'myathletik-child' ),
				),
				array(
					'question' => __( 'Should buyers require a specific score before approval?', 'myathletik-child' ),
					'answer'   => __( 'Not as a universal rule. Set project-specific mandatory requirements and then compare trade-offs. If a numerical score is used internally, document the reason for each weight and do not present the total as an industry standard.', 'myathletik-child' ),
				),
				array(
					'question' => __( 'What should be verified first for technical performance knitwear?', 'myathletik-child' ),
					'answer'   => __( 'Start with the legal and production scope, nominated finished fabric, seam map, sample performance, project-level capacity plan and controlled approval system. These determine whether the supplier can reproduce the intended garment before broader commercial optimization.', 'myathletik-child' ),
				),
			),
			'references'       => array(
				array(
					'label' => __( 'Textile Exchange Content Claim Standard', 'myathletik-child' ),
					'url'   => 'https://textileexchange.org/content-claim-standard/',
				),
				array(
					'label' => __( 'GOTS certification and labelling guidance', 'myathletik-child' ),
					'url'   => 'https://global-standard.org/certification-and-labelling/who-needs-to-be-certified',
				),
				array(
					'label' => __( 'OEKO-TEX STANDARD 100', 'myathletik-child' ),
					'url'   => 'https://www.oeko-tex.com/en/our-standards/oeko-tex-standard-100',
				),
				array(
					'label' => __( 'SLCP Converged Assessment Framework', 'myathletik-child' ),
					'url'   => 'https://slconvergence.org/tool',
				),
				array(
					'label' => __( 'U.S. Department of Homeland Security UFLPA guidance', 'myathletik-child' ),
					'url'   => 'https://www.dhs.gov/uflpa',
				),
				array(
					'label' => __( 'ZDHC Manufacturing Restricted Substances List', 'myathletik-child' ),
					'url'   => 'https://www.zdhc.org/mrsl',
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
