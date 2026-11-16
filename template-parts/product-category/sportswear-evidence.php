<?php
/** Buyer-facing evidence for the sportswear category. */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="ma-product-section ma-sportswear-evidence" aria-labelledby="ma-sportswear-evidence-title">
	<div class="ma-section-inner">
		<div class="ma-section-heading">
			<p class="ma-section-kicker"><?php esc_html_e( 'Manufacturing evidence', 'myathletik-child' ); ?></p>
			<h2 id="ma-sportswear-evidence-title"><?php esc_html_e( 'Explore the evidence behind our sportswear capabilities', 'myathletik-child' ); ?></h2>
			<p><?php esc_html_e( 'Review garment examples, production footage, fabric references, and buyer-published supplier lists as you evaluate a program.', 'myathletik-child' ); ?></p>
		</div>
		<div class="ma-sportswear-evidence__grid">
			<article class="ma-sportswear-evidence__card">
				<header class="ma-sportswear-evidence__card-heading">
					<span class="ma-feature-icon ma-sportswear-evidence__icon" aria-hidden="true"><?php get_template_part( 'template-parts/ui/line-icon', null, array( 'name' => 'garment' ) ); ?></span>
					<h3><?php esc_html_e( 'Sportswear examples', 'myathletik-child' ); ?></h3>
				</header>
				<p><?php esc_html_e( 'Browse the sportswear lookbook for examples of training tops, sports bras, leggings, and shorts.', 'myathletik-child' ); ?></p>
				<a href="#ma-product-showcase-title"><?php esc_html_e( 'View the sportswear lookbook', 'myathletik-child' ); ?> <span aria-hidden="true">→</span></a>
			</article>
			<article class="ma-sportswear-evidence__card">
				<header class="ma-sportswear-evidence__card-heading">
					<span class="ma-feature-icon ma-sportswear-evidence__icon" aria-hidden="true"><?php get_template_part( 'template-parts/ui/line-icon', null, array( 'name' => 'activeseam' ) ); ?></span>
					<h3><?php esc_html_e( 'Technical seam production', 'myathletik-child' ); ?></h3>
				</header>
				<p><?php esc_html_e( 'See separate Yamato FLATLOCK and Merrow ACTIVESEAM production examples, including a finished seam shown in its natural state.', 'myathletik-child' ); ?></p>
				<a href="<?php echo esc_url( home_url( '/flatlock-vs-activeseam-technical-knitwear/#industrial-flatlock' ) ); ?>"><?php esc_html_e( 'View the seam production evidence', 'myathletik-child' ); ?> <span aria-hidden="true">→</span></a>
			</article>
			<article class="ma-sportswear-evidence__card ma-sportswear-evidence__card--fabric">
				<header class="ma-sportswear-evidence__card-heading">
					<span class="ma-feature-icon ma-sportswear-evidence__icon" aria-hidden="true"><?php get_template_part( 'template-parts/ui/line-icon', null, array( 'name' => 'construction' ) ); ?></span>
					<h3><?php esc_html_e( 'Knitted fabric references', 'myathletik-child' ); ?></h3>
				</header>
				<p><?php esc_html_e( 'Compare representative fabric references by fiber composition and GSM. Availability and final specifications are confirmed for each project.', 'myathletik-child' ); ?></p>
				<a href="<?php echo esc_url( home_url( '/knitted-fabrics-manufacturer/#merino-fabric-examples' ) ); ?>"><?php esc_html_e( 'Explore the fabric selection library', 'myathletik-child' ); ?> <span aria-hidden="true">→</span></a>
			</article>
			<article class="ma-sportswear-evidence__card ma-sportswear-evidence__card--sources">
				<div class="ma-sportswear-evidence__details">
					<header class="ma-sportswear-evidence__card-heading">
						<span class="ma-feature-icon ma-sportswear-evidence__icon" aria-hidden="true"><?php get_template_part( 'template-parts/ui/line-icon', null, array( 'name' => 'commercial' ) ); ?></span>
						<h3><?php esc_html_e( 'Buyer-published supplier lists', 'myathletik-child' ); ?></h3>
					</header>
					<p><?php esc_html_e( 'Zhangjiagang Athletik Clothing Co., Limited appears in Canadian Tire Corporation’s Tier 1 Owned Brand supplier factory list, updated January 6, 2026, and Sainsbury’s September 2026 Tier 1 list for general merchandise and clothing.', 'myathletik-child' ); ?></p>
					<p><?php esc_html_e( 'These disclosures identify the production site; they do not establish specific sportswear orders or endorsements.', 'myathletik-child' ); ?></p>
				</div>
				<div class="ma-sportswear-evidence__sources">
					<a href="<?php echo esc_url( 'https://s201.q4cdn.com/326551073/files/doc_downloads/2026/03/CTC-Tier-1-Owned-Brand-Supplier-List_EN.pdf#page=4' ); ?>"><span><?php esc_html_e( 'Canadian Tire supplier list (PDF, page 4)', 'myathletik-child' ); ?></span> <span aria-hidden="true">↗</span></a>
					<a href="<?php echo esc_url( 'https://corporate.sainsburys.co.uk/media/334du1a0/tier-one-supplier-list-gm-clothing-september-2026.pdf#page=10' ); ?>"><span><?php esc_html_e( 'Sainsbury’s supplier list (PDF, page 10)', 'myathletik-child' ); ?></span> <span aria-hidden="true">↗</span></a>
				</div>
			</article>
		</div>
	</div>
</section>
