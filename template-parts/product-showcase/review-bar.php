<?php
/** Local review navigation, rendered only by the two Product Showcase templates. */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! function_exists( 'myathletik_product_showcase_preview_enabled' ) || ! myathletik_product_showcase_preview_enabled() ) {
	return;
}
$current = isset( $args['current'] ) ? $args['current'] : '';
?>
<aside class="ma-pl-review-bar" lang="zh-CN">
	<div class="ma-section-inner ma-pl-review-bar__inner">
		<span class="ma-pl-review-label">LOCAL REVIEW · 本地审核 · 暂不上线</span>
		<nav aria-label="本地审核页面">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">首页入口</a>
			<a href="<?php echo esc_url( myathletik_product_showcase_url() ); ?>"<?php echo 'library' === $current ? ' aria-current="page"' : ''; ?>>展示库</a>
			<a href="<?php echo esc_url( home_url( '/merino-wool-manufacturer/' ) ); ?>">Merino 入口</a>
			<a href="<?php echo esc_url( myathletik_product_example_url( 'ocean-depth' ) ); ?>"<?php echo 'detail' === $current ? ' aria-current="page"' : ''; ?>>单款详情</a>
		</nav>
	</div>
</aside>
