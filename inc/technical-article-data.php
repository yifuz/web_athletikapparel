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
		'featured_image'   => 'production/articles/covers/technical-knitwear-guides-cover.webp',
		'featured_small'   => 'production/articles/covers/technical-knitwear-guides-cover-800.webp',
		'featured_alt'     => __( 'Technical knitwear development table with garment drawings, fabric swatches, seam samples and measuring tools', 'myathletik-child' ),
		'featured_width'   => 1448,
		'featured_height'  => 1086,
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
			array(
				'title' => __( 'Quality control', 'myathletik-child' ),
				'copy'  => __( 'Incoming checks, in-line controls, AQL sampling, final inspection and documentation.', 'myathletik-child' ),
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
			'featured_image'   => 'production/articles/covers/flatlock-overlock-seam-comparison-v2.webp',
			'featured_small'   => 'production/articles/covers/flatlock-overlock-seam-comparison-v2-800.webp',
			'featured_alt'     => __( 'Side-by-side comparison of FLATLOCK and OVERLOCK seams on black technical knit fabric', 'myathletik-child' ),
			'featured_width'   => 1448,
			'featured_height'  => 1086,
			'related_articles' => array( 'technical-knitwear-tech-pack-guide', 'garment-quality-control-checklist' ),
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
		'flatlock-vs-activeseam-technical-knitwear' => array(
			'status'           => 'publish',
			'title'            => __( 'Industrial FLATLOCK vs Merrow ACTIVESEAM for Cut-and-Sew Technical Knitwear', 'myathletik-child' ),
			'seo_title'        => __( 'FLATLOCK vs Merrow ACTIVESEAM for Technical Knitwear | Athletik', 'myathletik-child' ),
			'meta_description' => __( 'Compare industrial 4-needle 6-thread FLATLOCK with Merrow MB-4DFO ACTIVESEAM: construction, applications, tech pack callouts and sample approval.', 'myathletik-child' ),
			'kicker'           => __( 'Technical seam construction guide', 'myathletik-child' ),
			'topic'            => __( 'Technical seam construction', 'myathletik-child' ),
			'summary'          => __( 'Compare industrial FLATLOCK and Merrow ACTIVESEAM as separate low-profile seam systems, including machine references, thread configurations, garment applications and approval requirements.', 'myathletik-child' ),
			'intro'            => __( 'Industrial FLATLOCK and Merrow ACTIVESEAM are separate low-profile seam systems. A common FLATLOCK reference is a 4-needle, 6-thread feed-off-the-arm flatseam; Merrow MB-4DFO 2.0 is a 2-needle, 2- or 3-thread flat-overlock platform.', 'myathletik-child' ),
			'reviewed_on'      => '2026-09-16',
			'featured_image'   => 'production/articles/covers/flatlock-activeseam-technical-knitwear-cover.webp',
			'featured_small'   => 'production/articles/covers/flatlock-activeseam-technical-knitwear-cover-800.webp',
			'featured_alt'     => __( 'Side-by-side industrial FLATLOCK and Merrow ACTIVESEAM sewing operations on technical knit garments', 'myathletik-child' ),
			'featured_width'   => 1536,
			'featured_height'  => 1024,
			'related_articles' => array( 'flatlock-vs-overlock-technical-knitwear', 'technical-knitwear-tech-pack-guide', 'garment-quality-control-checklist' ),
			'article_section'  => __( 'Technical knitwear construction', 'myathletik-child' ),
			'about'            => array( 'FLATLOCK', 'Merrow ACTIVESEAM', 'MB-4DFO 2.0', 'Technical knitwear' ),
			'cta_kicker'       => __( 'Develop a technical knitwear program', 'myathletik-child' ),
			'cta_title'        => __( 'Approve the seam on the production-intent fabric', 'myathletik-child' ),
			'cta_copy'         => __( 'Send the garment drawing or tech pack, finished-fabric specification, intended use, order quantity, seam requirements and testing criteria for a construction review.', 'myathletik-child' ),
			'toc'              => array(
				'why-distinction'     => __( 'Why the distinction matters', 'myathletik-child' ),
				'industrial-flatlock' => __( 'What is industrial FLATLOCK?', 'myathletik-child' ),
				'merrow-activeseam'   => __( 'What is Merrow ACTIVESEAM?', 'myathletik-child' ),
				'production-evidence' => __( 'What the production evidence shows', 'myathletik-child' ),
				'comparison'          => __( 'Practical comparison', 'myathletik-child' ),
				'applications'        => __( 'Garment applications', 'myathletik-child' ),
				'choosing'            => __( 'How buyers should choose', 'myathletik-child' ),
				'tech-pack'           => __( 'Tech pack checklist', 'myathletik-child' ),
				'validation'          => __( 'Athletik development process', 'myathletik-child' ),
				'faq'                 => __( 'Common buyer questions', 'myathletik-child' ),
			),
			'faq'              => array(
				array(
					'question' => __( 'Is ACTIVESEAM the same as FLATLOCK?', 'myathletik-child' ),
					'answer'   => __( 'No. ACTIVESEAM is Merrow\'s named flat-overlock system produced on the MB-4DFO platform. Industrial FLATLOCK is a different flatseam construction; 4-needle, 6-thread stitch type 607 is a common reference in technical knitwear. The two should be specified and quoted separately.', 'myathletik-child' ),
				),
				array(
					'question' => __( 'How many threads does the Merrow MB-4DFO 2.0 use?', 'myathletik-child' ),
					'answer'   => __( 'Merrow\'s official specification lists 2 needles and a 2- or 3-thread configuration. Athletik uses both thread configurations according to project requirements. The setup for an individual garment should be confirmed during sampling rather than inferred from a general production image.', 'myathletik-child' ),
				),
				array(
					'question' => __( 'Is ACTIVESEAM stronger or more stretchable than FLATLOCK?', 'myathletik-child' ),
					'answer'   => __( 'The seam name alone does not establish the result on a specific garment. Platform-level performance claims should not be applied automatically to a different fabric, thread or setup. Compare sew-offs using the nominated material and agreed test methods.', 'myathletik-child' ),
				),
				array(
					'question' => __( 'Can both systems be used for Merino wool base layers?', 'myathletik-child' ),
					'answer'   => __( 'Both may be evaluated for Merino wool or Merino-blend base layers, subject to the fabric structure, weight, stretch, recovery, thread and seam location. Approval should be based on the actual bulk-intent fabric, not on a seam made on an unrelated synthetic knit.', 'myathletik-child' ),
				),
				array(
					'question' => __( 'Does a buyer need to specify the sewing-machine model?', 'myathletik-child' ),
					'answer'   => __( 'Specify the model or named platform when it is essential to the required construction, as with Merrow ACTIVESEAM. Also define the seam location, appearance and performance criteria. A machine model without an approved sew-off is not a complete product specification.', 'myathletik-child' ),
				),
				array(
					'question' => __( 'Can FLATLOCK and ACTIVESEAM be used in the same garment?', 'myathletik-child' ),
					'answer'   => __( 'Yes, if the seam map and development results support that combination. Different garment operations may have different profile, extension, appearance and assembly requirements. Each construction should be identified by location and approved on the production-intent fabric.', 'myathletik-child' ),
				),
			),
			'references'       => array(
				array(
					'label' => __( 'Merrow MB-4DFO 2.0 official product page', 'myathletik-child' ),
					'url'   => 'https://www.merrow.com/Sergers_and_Overlock_Sewing_Machines/mb4dfo',
				),
				array(
					'label' => __( 'Yamato FD-62G 4-needle, 6-thread flatseamer', 'myathletik-child' ),
					'url'   => 'https://www.yamato-sewing.com/en/product/flatseamer/fd-62g/',
				),
				array(
					'label' => __( 'Yamato FD-62G submodels and published applications', 'myathletik-child' ),
					'url'   => 'https://www.yamato-sewing.com/en/product/flatseamer/fd-62g/submodel/',
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
			'featured_image'   => 'production/articles/covers/technical-knitwear-tech-pack-cover.webp',
			'featured_small'   => 'production/articles/covers/technical-knitwear-tech-pack-cover-800.webp',
			'featured_alt'     => __( 'Technical knitwear tech pack layout with garment flats, measurement points, fabric swatches and seam samples', 'myathletik-child' ),
			'featured_width'   => 1448,
			'featured_height'  => 1086,
			'related_articles' => array( 'flatlock-vs-overlock-technical-knitwear', 'garment-quality-control-checklist' ),
			'article_section'  => __( 'Technical knitwear product development', 'myathletik-child' ),
			'about'            => array( 'Technical knitwear', 'Tech pack', 'Apparel tech pack', 'Seam map', 'Garment testing' ),
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
			'featured_image'   => 'production/articles/covers/technical-knitwear-oem-evaluation-cover.webp',
			'featured_small'   => 'production/articles/covers/technical-knitwear-oem-evaluation-cover-800.webp',
			'featured_alt'     => __( 'Athletik technical knitwear garment production floor in Zhangjiagang, Jiangsu', 'myathletik-child' ),
			'featured_width'   => 1536,
			'featured_height'  => 1024,
			'related_articles' => array( 'top-sportswear-manufacturers-china', 'garment-quality-control-checklist' ),
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
					'url'   => 'https://global-standards.org/our-standards/gots/how-it-works',
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
		'top-sportswear-manufacturers-china' => array(
			'status'           => 'publish',
			'title'            => __( 'Top 5 OEM/ODM Sportswear Manufacturers in China for Mid-Sized Brands (2026)', 'myathletik-child' ),
			'seo_title'        => __( 'Top 5 Sportswear Manufacturers in China (2026) | Athletik', 'myathletik-child' ),
			'meta_description' => __( 'Compare five Chinese OEM/ODM sportswear manufacturers by product fit, MOQ, technical construction, fabric development and public manufacturing evidence.', 'myathletik-child' ),
			'kicker'           => __( 'Evidence-based supplier shortlist', 'myathletik-child' ),
			'topic'            => __( 'Supplier comparison', 'myathletik-child' ),
			'summary'          => __( 'Compare Athletik, HUCAI, SANSANSUN, INGORSPORTS and Bellasports by product fit, public MOQ signals, construction capabilities and evidence limitations.', 'myathletik-child' ),
			'intro'            => __( 'Based on publicly available manufacturer information reviewed on September 14, 2026, five China-based candidates worth comparing are Athletik Clothing, HUCAI Sportswear, SANSANSUN, INGORSPORTS and Bellasports. Each is aligned with a different type of sportswear program.', 'myathletik-child' ),
			'reviewed_on'      => '2026-09-14',
			'featured_image'   => 'production/articles/covers/technical-knitwear-sewing-machine-cover.webp',
			'featured_small'   => 'production/articles/covers/technical-knitwear-sewing-machine-cover-800.webp',
			'featured_alt'     => __( 'Industrial sewing machine stitching technical knitwear fabric in a production room', 'myathletik-child' ),
			'featured_width'   => 1536,
			'featured_height'  => 1024,
			'related_articles' => array( 'evaluate-technical-knitwear-oem', 'technical-knitwear-tech-pack-guide' ),
			'article_section'  => __( 'Sportswear supplier comparison', 'myathletik-child' ),
			'about'            => array( 'OEM sportswear manufacturers in China', 'Sportswear sourcing', 'Technical knitwear', 'MOQ', 'Supplier evaluation' ),
			'cta_kicker'       => __( 'Evaluate a technical knitwear program', 'myathletik-child' ),
			'cta_title'        => __( 'Discuss the program before sampling', 'myathletik-child' ),
			'cta_copy'         => __( 'Send the intended product, fabric specification, seam requirements, quantity, target market, testing requirements and delivery window so Athletik Clothing can review whether the program fits its technical construction and garment MOQ.', 'myathletik-child' ),
			'toc'              => array(
				'quick-comparison' => __( 'Quick comparison', 'myathletik-child' ),
				'methodology'       => __( 'How the shortlist was selected', 'myathletik-child' ),
				'athletik-clothing' => __( 'Athletik Clothing', 'myathletik-child' ),
				'hucai-sportswear'  => __( 'HUCAI Sportswear', 'myathletik-child' ),
				'sansansun'         => __( 'SANSANSUN', 'myathletik-child' ),
				'ingorsports'       => __( 'INGORSPORTS', 'myathletik-child' ),
				'bellasports'       => __( 'Bellasports', 'myathletik-child' ),
				'program-fit'       => __( 'Which manufacturer fits which program?', 'myathletik-child' ),
				'rfq'               => __( 'What to send in the same RFQ', 'myathletik-child' ),
				'faq'               => __( 'Common buyer questions', 'myathletik-child' ),
			),
			'faq'              => array(
				array(
					'question' => __( 'Is 500 pieces per style enough for a custom sportswear program in China?', 'myathletik-child' ),
					'answer'   => __( 'It can be. All five suppliers in this shortlist publicly indicate an order model at or below that level somewhere in their offer. Actual feasibility still depends on whether 500 pieces means one style or one color, whether the fabric is in stock or custom-made, the number of sizes, trim minimums, construction complexity and the supplier\'s current production plan.', 'myathletik-child' ),
				),
				array(
					'question' => __( 'Does a lower MOQ mean a manufacturer is a better fit for a mid-sized brand?', 'myathletik-child' ),
					'answer'   => __( 'No. A lower MOQ reduces inventory exposure, but it may apply only to stock fabrics, existing ODM designs or limited customization. A mid-sized brand should compare repeatability, fabric and construction control, quality evidence, delivery reliability and scale-up capacity alongside MOQ.', 'myathletik-child' ),
				),
				array(
					'question' => __( 'Are the certifications listed on manufacturer websites verified in this guide?', 'myathletik-child' ),
					'answer'   => __( 'No. This guide records public manufacturer statements but does not validate current certificates. Request the complete document and verify the legal entity, site, product or material scope, issuing body and validity date with the relevant certification or audit system.', 'myathletik-child' ),
				),
				array(
					'question' => __( 'Should a buyer contact all five factories?', 'myathletik-child' ),
					'answer'   => __( 'Usually not. Select two or three whose documented product and process fit the program, send the same RFQ, and compare their technical response and samples. A focused shortlist produces more useful evidence than collecting many non-comparable quotations.', 'myathletik-child' ),
				),
			),
			'references_kicker' => __( 'Public evidence', 'myathletik-child' ),
			'references_title'  => __( 'Sources reviewed', 'myathletik-child' ),
			'references'       => array(
				array(
					'label' => __( 'Athletik Clothing sportswear manufacturing program', 'myathletik-child' ),
					'url'   => 'https://www.athletikapparel.com/sportswear-manufacturer/',
				),
				array(
					'label' => __( 'Athletik Clothing company and production overview', 'myathletik-child' ),
					'url'   => 'https://www.athletikapparel.com/about-us/',
				),
				array(
					'label' => __( 'HUCAI current OEM sportswear MOQ FAQ', 'myathletik-child' ),
					'url'   => 'https://www.hcsportswear.com/f755077/What-is-the-MOQ-for-OEM-sportswear-orders.htm',
				),
				array(
					'label' => __( 'HUCAI factory and production procedures', 'myathletik-child' ),
					'url'   => 'https://www.hcsportswear.com/comm01/Factory-And-Production-Procedures.htm',
				),
				array(
					'label' => __( 'SANSANSUN OEM and ODM services', 'myathletik-child' ),
					'url'   => 'https://sansansports.com/services/odm-oem/',
				),
				array(
					'label' => __( 'SANSANSUN manufacturing capabilities', 'myathletik-child' ),
					'url'   => 'https://sansansports.com/our-capabilities/manufacturing/',
				),
				array(
					'label' => __( 'INGORSPORTS manufacturer overview', 'myathletik-child' ),
					'url'   => 'https://www.ingorsports.com/custom-sportswear-manufacturer.html',
				),
				array(
					'label' => __( 'INGORSPORTS activewear categories and OEM/ODM scope', 'myathletik-child' ),
					'url'   => 'https://www.ingorsports.com/categories',
				),
				array(
					'label' => __( 'INGORSPORTS example product-level MOQ disclosure', 'myathletik-child' ),
					'url'   => 'https://www.ingorsports.com/oem-odm-custom-backless-bodysuit-yoga-sports-jumpsuit.html',
				),
				array(
					'label' => __( 'Bellasports company and manufacturing overview', 'myathletik-child' ),
					'url'   => 'https://www.cnbellasports.com/',
				),
				array(
					'label' => __( 'Bellasports company profile', 'myathletik-child' ),
					'url'   => 'https://www.cnbellasports.com/pages/about-us',
				),
				array(
					'label' => __( 'Bellasports company-controlled MOQ and production overview', 'myathletik-child' ),
					'url'   => 'https://www.linkedin.com/posts/bellasports_activewear-activewearmanufacturer-oem-activity-7495943669447909377-cqUn',
				),
			),
			'item_list'        => array(
				array(
					'name' => 'Athletik Clothing',
					'url'  => 'https://www.athletikapparel.com/sportswear-manufacturer/',
				),
				array(
					'name' => 'HUCAI Sportswear',
					'url'  => 'https://www.hcsportswear.com/',
				),
				array(
					'name' => 'SANSANSUN',
					'url'  => 'https://sansansports.com/',
				),
				array(
					'name' => 'INGORSPORTS',
					'url'  => 'https://www.ingorsports.com/',
				),
				array(
					'name' => 'Bellasports',
					'url'  => 'https://www.cnbellasports.com/',
				),
			),
		),
		'garment-quality-control-checklist' => array(
			'status'           => 'publish',
			'title'            => __( 'Garment Quality Control Checklist for Technical Knitwear', 'myathletik-child' ),
			'seo_title'        => __( 'Garment Quality Control Checklist for Knitwear | Athletik', 'myathletik-child' ),
			'meta_description' => __( 'QC checklist for cut-and-sew technical knitwear: incoming fabric checks, in-line inspection, AQL sampling, final inspection and needle control.', 'myathletik-child' ),
			'kicker'           => __( 'Quality control guide', 'myathletik-child' ),
			'topic'            => __( 'Quality control', 'myathletik-child' ),
			'summary'          => __( 'Incoming fabric checks, in-line inspection, AQL sampling, final inspection, needle control and QC documentation for technical knitwear programs.', 'myathletik-child' ),
			'intro'            => __( 'A workable garment quality control program combines incoming material checks, in-line process controls, a final pre-shipment inspection and the records that connect each result to the purchase order.', 'myathletik-child' ),
			'reviewed_on'      => '2026-08-20',
			'featured_image'   => 'production/articles/covers/garment-qc-checklist-cover.webp',
			'featured_small'   => 'production/articles/covers/garment-qc-checklist-cover-800.webp',
			'featured_alt'     => __( 'Quality control inspector measuring a dark technical knit garment with a tape measure on a white inspection table', 'myathletik-child' ),
			'featured_width'   => 1448,
			'featured_height'  => 1086,
			'related_articles' => array( 'technical-knitwear-tech-pack-guide', 'evaluate-technical-knitwear-oem' ),
			'article_section'  => __( 'Technical knitwear quality control', 'myathletik-child' ),
			'about'            => array( 'Garment quality control', 'AQL sampling', 'Final inspection', 'Technical knitwear' ),
			'cta_kicker'       => __( 'Set the QC basis before production', 'myathletik-child' ),
			'cta_title'        => __( 'Send the tech pack and QC requirements', 'myathletik-child' ),
			'cta_copy'         => __( 'Send the current tech pack, finished-fabric specification, POM table, order quantity and inspection or testing requirements so the quality plan can be reviewed against the actual program.', 'myathletik-child' ),
			'toc'              => array(
				'pre-production'        => __( 'Pre-production quality controls', 'myathletik-child' ),
				'in-line'               => __( 'In-line production controls', 'myathletik-child' ),
				'final-inspection'      => __( 'Final inspection before shipment', 'myathletik-child' ),
				'testing-compliance'    => __( 'Testing and compliance verification', 'myathletik-child' ),
				'needle-control'        => __( 'Needle control and product safety', 'myathletik-child' ),
				'qc-documentation'      => __( 'QC documentation and records', 'myathletik-child' ),
				'tech-pack-requirements' => __( 'Tech pack QC clauses', 'myathletik-child' ),
				'faq'                   => __( 'Common buyer questions', 'myathletik-child' ),
			),
			'faq'              => array(
				array(
					'question' => __( 'Is third-party inspection necessary if the factory has internal QC?', 'myathletik-child' ),
					'answer'   => __( 'They serve different purposes. Internal QC manages the process — catching and correcting issues during production. Third-party inspection provides an independent accept-or-reject decision on a finished sample. Many buyers use both: internal QC for process control, third-party for final verification before shipment.', 'myathletik-child' ),
				),
				array(
					'question' => __( 'What does AQL 2.5 actually mean?', 'myathletik-child' ),
					'answer'   => __( 'AQL 2.5 refers to the acceptance quality limit for major defects under ISO 2859-1 or ANSI/ASQ Z1.4 sampling at General Inspection Level II. It defines the accept and reject numbers for the sample size, not that 2.5% of the lot may be defective. The full plan requires the sampling standard, inspection level and AQL per defect class.', 'myathletik-child' ),
				),
				array(
					'question' => __( 'Should every order have the same QC coverage?', 'myathletik-child' ),
					'answer'   => __( 'No. Inspection level and defect definitions should scale with product risk, claim sensitivity and market requirements. A premium compression garment sold under a performance claim justifies tighter inspection than a basic promotional T-shirt. State the reasoning in the program standard, then reference it per style.', 'myathletik-child' ),
				),
				array(
					'question' => __( 'What happens when defects are found after shipment?', 'myathletik-child' ),
					'answer'   => __( 'The handling route should be agreed before the order, not negotiated under shipment pressure. Options include rework or 100% sorting with re-inspection, rejection with remake or replacement, commercial settlement per the purchase-order terms, or a written concession in which the buyer knowingly accepts a defined deviation for that lot.', 'myathletik-child' ),
				),
			),
			'references'       => array(
				array(
					'label' => __( 'ISO 2859-1 sampling procedures for inspection by attributes', 'myathletik-child' ),
					'url'   => 'https://www.iso.org/obp/ui/#iso:std:iso:2859:-1:en',
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
					'label' => __( 'Textile Exchange Content Claim Standard', 'myathletik-child' ),
					'url'   => 'https://textileexchange.org/content-claim-standard/',
				),
				array(
					'label' => __( 'OEKO-TEX STANDARD 100', 'myathletik-child' ),
					'url'   => 'https://www.oeko-tex.com/en/our-standards/oeko-tex-standard-100',
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
