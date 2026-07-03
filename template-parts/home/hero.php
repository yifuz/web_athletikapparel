<?php
/**
 * Homepage hero section ¡ª split layout: text left, image right.
 *
 * @package myathletik-child
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$hero_image = get_stylesheet_directory_uri() . '/assets/images/production/%E4%B8%BB%E5%9B%BE/pexels-cottonbro-4614224.jpg';
?>

<section class="ma-home-hero" aria-label="<?php esc_attr_e( 'myathletik homepage introduction', 'myathletik-child' ); ?>">
    <div class="ma-home-hero__inner">
        <div class="ma-home-hero__content">
            <p class="ma-home-hero__eyebrow"><?php esc_html_e( 'Technical knitwear manufacturing partner', 'myathletik-child' ); ?></p>
            <h1 class="ma-home-hero__title"><?php esc_html_e( 'Vertically Integrated OEM/ODM Knitwear Manufacturer', 'myathletik-child' ); ?></h1>
            <p class="ma-home-hero__subhead"><?php esc_html_e( 'Full-package flatlock and activeseam knitwear for underwear, sportswear, and outdoor brands worldwide ¡ª backed by 15 years of technical production and our own integrated manufacturing.', 'myathletik-child' ); ?></p>

            <div class="ma-home-hero__actions" aria-label="<?php esc_attr_e( 'Primary homepage actions', 'myathletik-child' ); ?>">
                <a class="ma-button ma-button--primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
                    <?php esc_html_e( 'Request a Quote', 'myathletik-child' ); ?>
                </a>
                <a class="ma-button ma-button--outline" href="<?php echo esc_url( home_url( '/products/' ) ); ?>">
                    <?php esc_html_e( 'View Products', 'myathletik-child' ); ?>
                </a>
            </div>
        </div>

        <div class="ma-home-hero__image">
            <img
                src="<?php echo esc_url( $hero_image ); ?>"
                alt="<?php esc_attr_e( 'Athletik Clothing technical knitwear production floor with Yamato and Merrow flatlock machines', 'myathletik-child' ); ?>"
                loading="eager"
                decoding="async">
        </div>
    </div>
</section>
