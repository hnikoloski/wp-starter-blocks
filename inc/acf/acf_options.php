<?php

if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title'    => 'Starter General Settings',
        'menu_title'    => 'Starter Settings',
        'menu_slug'     => 'starter-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Starter Header Settings',
        'menu_title'    => 'Header',
        'parent_slug'   => 'starter-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Starter Footer Settings',
        'menu_title'    => 'Footer',
        'parent_slug'   => 'starter-general-settings',
    ));
}
