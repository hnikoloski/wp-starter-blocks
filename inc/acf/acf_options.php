<?php

if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title'    => 'TamTam General Settings',
        'menu_title'    => 'TamTam Settings',
        'menu_slug'     => 'tamtam-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'TamTam Header Settings',
        'menu_title'    => 'Header',
        'parent_slug'   => 'tamtam-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'TamTam Footer Settings',
        'menu_title'    => 'Footer',
        'parent_slug'   => 'tamtam-general-settings',
    ));
}
