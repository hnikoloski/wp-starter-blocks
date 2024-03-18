<?php

/**
 * Enqueue scripts and styles.
 */
function wp_starter_enqueue_assets()
{
    $theme_version = wp_get_theme()->get('Version');
    $manifest_path = get_template_directory() . '/dist/.vite/manifest.json';

    if (file_exists($manifest_path)) {
        $manifest = json_decode(file_get_contents($manifest_path), true);

        // Main app script and global style
        $app_js = $manifest['src/app.js']['file'];
        $global_style_css = $manifest['src/app.scss']['file'];

        wp_enqueue_script('wp_starter-app', get_template_directory_uri() . "/dist/$app_js", array(), $theme_version, true);
        wp_enqueue_style('wp_starter-global-style', get_template_directory_uri() . "/dist/$global_style_css", array(), $theme_version);

        // Dynamically enqueue block assets
        $blocks = [
            'hero_for_shop_block.js',
            'products_grid_block.js',
            'shop_archive_block.js',
        ];

        foreach ($blocks as $block) {
            $block_path = 'src/blocks-assets/scripts/' . $block;
            if (isset($manifest[$block_path])) {
                $block_js = $manifest[$block_path]['file'];
                wp_enqueue_script('wp_starter-' . $block, get_template_directory_uri() . "/dist/$block_js", array('wp_starter-app'), $theme_version, true);

                // Check and enqueue CSS if it exists for the block
                if (isset($manifest[$block_path]['css'])) {
                    foreach ($manifest[$block_path]['css'] as $css) {
                        wp_enqueue_style('wp_starter-' . $block . '-css', get_template_directory_uri() . "/dist/$css", array('wp_starter-global-style'), $theme_version);
                    }
                }
            }
        }
    } else {
        // Manifest file not found - handle error or fallback
    }
}
add_action('wp_enqueue_scripts', 'wp_starter_enqueue_assets');
