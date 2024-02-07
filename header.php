<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * 
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <?php wp_head(); ?>
</head>

<body <?php body_class('overflow-hidden'); ?>>
    <?php wp_body_open();
    require('template-parts/preloader.php');
    $custom_logo_id = get_theme_mod('custom_logo');
    $logoUrl = wp_get_attachment_image_src($custom_logo_id, 'full');
    $logoWidth = get_field('logo_width', 'option') ? get_field('logo_width', 'option') : '75';
    ?>
    <div id="page" class="site">
        <header id="masthead" class="site-header page-padding-x">
            <a href="<?= home_url(); ?>" class="logo-wrapper d-block" style="--logo-width:<?php echo $logoWidth; ?>px;">
                <img src="<?= $logoUrl[0]; ?>" alt="<?= get_bloginfo(); ?>" class="full-size-img full-size-img-contain d-block">
            </a>
            <div class="header-search">
                <form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url(home_url('/')); ?>">
                    <input type="search" id="woocommerce-product-search-field" class="search-field" placeholder="<?php echo esc_attr_x('Search products…', 'placeholder'); ?>" value="<?php get_search_query(); ?>" name="s" />
                    <button type="submit" value="<?php echo esc_attr_x('Search', 'submit button'); ?>" title="<?php echo esc_attr_x('Search', 'submit button'); ?>"><i class="fas fa-search"></i></button>
                    <input type="hidden" name="post_type" value="product" />
                </form>
            </div>

            <nav id="site-navigation" class="main-navigation">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'menu-1',
                        'menu_id'        => 'primary-menu',
                        'container'      => false,
                    )
                );
                ?>
            </nav><!-- #site-navigation -->

            <a href="<?php echo wc_get_cart_url(); ?>" title="<?php _e('View your shopping cart'); ?>" class="woocommerce-cart-link">
                <?php echo sprintf(_n('%d item', '%d items', WC()->cart->get_cart_contents_count()), WC()->cart->get_cart_contents_count()); ?>
                <?php echo WC()->cart->get_cart_total(); ?>
            </a>

            <div id="menu-trigger">
                <span></span>
                <span></span>
                <span></span>
            </div>
            </ul>
        </header><!-- #masthead -->