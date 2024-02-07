<?php

// Path: inc\acf-blocks.php

// Block categories
add_filter('block_categories_all', function ($categories) {

    // Adding a new category.
    $categories[] = array(
        'slug'  => 'tamtam',
        'title' => 'TamTam',
        // icon the logo
        'icon'  => 'tamtam',
        'order' => 1,
    );

    return $categories;
});

// Block Editor styles
function tamtam_editor_styles()
{
    wp_enqueue_style('tamtam-editor-styles', get_template_directory_uri() . '/dist/admin/editor.css', false, TAMTAM_VERSION, 'all');
}
add_action('enqueue_block_editor_assets', 'tamtam_editor_styles');


function tamtam_acf_init_block_types()
{
    if (function_exists('acf_register_block_type')) {
        // Hero block
        acf_register_block_type(
            array(
                'name'              => 'hero',
                'title'             => __('Hero'),
                'description'       => __('A block to display hero.'),
                'render_template'   => 'block-templates/hero-block.php',
                'category'          => 'tamtam',
                'icon'              => 'tamtam',
                'keywords'          => array('hero', 'tamtam'),
                'supports'          => array(
                    'mode' => true,
                ),
            ),
        );

        // Hero for shop block
        acf_register_block_type(
            array(
                'name'              => 'hero-for-shop',
                'title'             => __('Hero for shop'),
                'description'       => __('A block to display hero for shop.'),
                'render_template'   => 'block-templates/hero-for-shop-block.php',
                'category'          => 'tamtam',
                'icon'              => 'tamtam',
                'keywords'          => array('hero for shop', 'tamtam'),
                'supports'          => array(
                    'mode' => true,
                ),
                'enqueue_script'    => get_template_directory_uri() . '/dist/hero_for_shop_block.js',
                'enqueue_style'     => get_template_directory_uri() . '/dist/hero_for_shop_block.css',
            ),
        );

        // Projects block
        acf_register_block_type(
            array(
                'name'              => 'projects',
                'title'             => __('Projects'),
                'description'       => __('A block to display projects.'),
                'render_template'   => 'block-templates/projects-block.php',
                'category'          => 'tamtam',
                'icon'              => 'tamtam',
                'keywords'          => array('projects', 'tamtam'),
                'supports'          => array(
                    'mode' => true,
                ),
            ),
        );

        // Products grid block
        acf_register_block_type(
            array(
                'name'              => 'products-grid',
                'title'             => __('Products grid'),
                'description'       => __('A block to display products grid.'),
                'render_template'   => 'block-templates/products-grid-block.php',
                'category'          => 'tamtam',
                'icon'              => 'tamtam',
                'keywords'          => array('products grid', 'tamtam'),
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
                'category'          => 'tamtam',
                'icon'              => 'tamtam',
                'keywords'          => array('best sellers', 'tamtam'),
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
                'category'          => 'tamtam',
                'icon'              => 'tamtam',
                'keywords'          => array('shop archive', 'tamtam'),
                'supports'          => array(
                    'mode' => true,
                ),
                'enqueue_script'    => get_template_directory_uri() . '/dist/shop_archive_block.js',
                'enqueue_style'     => get_template_directory_uri() . '/dist/shop_archive_block.css',
            ),
        );
    }
}
add_action('acf/init', 'tamtam_acf_init_block_types');
