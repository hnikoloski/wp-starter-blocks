<?php

// Path: inc\acf-blocks.php

// Block categories
add_filter('block_categories_all', function ($categories) {

    // Adding a new category.
    $categories[] = array(
        'slug'  => 'wp-starter',
        'title' => 'Wp Starter',
        // icon the logo
        'icon'  => 'wp-starter',
        'order' => 1,
    );

    return $categories;
});


function wp_starter_acf_init_block_types()
{
    if (function_exists('acf_register_block_type')) {
        // Hero for shop block
        acf_register_block_type(
            array(
                'name'              => 'hero-for-shop',
                'title'             => __('Hero for shop'),
                'description'       => __('A block to display hero for shop.'),
                'render_template'   => 'block-templates/hero-for-shop-block.php',
                'category'          => 'wp-starter',
                'icon'              => 'wp-starter',
                'keywords'          => array('hero for shop', 'wp-starter'),
                'supports'          => array(
                    'mode' => true,
                ),
                'enqueue_script'    => get_template_directory_uri() . '/dist/hero_for_shop_block.js',
                'enqueue_style'     => get_template_directory_uri() . '/dist/hero_for_shop_block.css',
            ),
        );

        // Products grid block
        acf_register_block_type(
            array(
                'name'              => 'products-grid',
                'title'             => __('Products grid'),
                'description'       => __('A block to display products grid.'),
                'render_template'   => 'block-templates/products-grid-block.php',
                'category'          => 'wp-starter',
                'icon'              => 'wp-starter',
                'keywords'          => array('products grid', 'wp-starter'),
                'supports'          => array(
                    'mode' => true,
                ),
                'enqueue_script'    => get_template_directory_uri() . '/dist/products_grid_block.js',
                'enqueue_style'     => get_template_directory_uri() . '/dist/products_grid_block.css',
            ),
        );

        // Best sellers block
        acf_register_block_type(
            array(
                'name'              => 'best-sellers',
                'title'             => __('Best sellers'),
                'description'       => __('A block to display best sellers.'),
                'render_template'   => 'block-templates/best-sellers-block.php',
                'category'          => 'wp-starter',
                'icon'              => 'wp-starter',
                'keywords'          => array('best sellers', 'wp-starter'),
                'supports'          => array(
                    'mode' => true,
                ),
            ),
        );

        // Shop Archive block
        acf_register_block_type(
            array(
                'name'              => 'shop-archive',
                'title'             => __('Shop Archive'),
                'description'       => __('A block to display shop archive.'),
                'render_template'   => 'block-templates/shop-archive-block/shop-archive-block.php',
                'category'          => 'wp-starter',
                'icon'              => 'wp-starter',
                'keywords'          => array('shop archive', 'wp-starter'),
                'supports'          => array(
                    'mode' => true,
                ),
                'enqueue_script'    => get_template_directory_uri() . '/dist/shop_archive_block.js',
                'enqueue_style'     => get_template_directory_uri() . '/dist/shop_archive_block.css',
            ),
        );
    }
}
add_action('acf/init', 'wp_starter_acf_init_block_types');
