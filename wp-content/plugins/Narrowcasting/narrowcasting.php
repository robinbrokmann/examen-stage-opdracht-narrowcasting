<?php

/*
Plugin Name:Narrowcasting plug-in
Description: Narrowcasting
Version: 1.0
Author: Robin Brokmann
*/


function custom_post_type()
{

    $labels = array(
        'name' => _x('Narrowcasting', 'Post Type General Name', 'text_domain'),
        'singular_name' => _x('Narrowcasting', 'Post Type Singular Name', 'text_domain'),
        'menu_name' => __('Narrowcasting', 'text_domain'),
        'parent_item_colon' => __('Parent Item:', 'text_domain'),
        'all_items' => __('Alle schermen', 'text_domain'),
        'view_item' => __('Bekijken', 'text_domain'),
        'add_new_item' => __('Nieuw Scherm Toevoegen', 'text_domain'),
        'add_new' => __('Nieuw Scherm', 'text_domain'),
        'edit_item' => __('Bewerken', 'text_domain'),
        'update_item' => __('Update Item', 'text_domain'),
        'search_items' => __('Zoeken', 'text_domain'),
        'not_found' => __('Geen schermen gevonden', 'text_domain'),
        'not_found_in_trash' => __('Niets gevonden in de prullenbak', 'text_domain'),
    );
    $args = array(
        'label' => __('Narrowcasting', 'text_domain'),
        'description' => __('Post Type voor Narrowcasting', 'text_domain'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'comments', 'custom-fields',),
        'taxonomies' => array(''),
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-video-alt3',
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    register_post_type('narrowcasting', $args);

}

// Hook into the 'init' action
add_action('init', 'custom_post_type', 0);







// Maakt verbinding met de template

add_filter( 'template_include', 'my_plugin_templates' );
function my_plugin_templates( $template ) {
    $post_types = array( 'narrowcasting' );

    if ( is_singular( $post_types ) && file_exists( plugin_dir_path(__FILE__) . 'templates/single_narrowcasting.php' ) ){
        $template = plugin_dir_path(__FILE__) . 'templates/single_narrowcasting.php';
    }

    return $template;
}

