<?php

/*
Plugin Name:Narrowcasting plug-in
Description: Narrowcasting systeem creert de mogelijkheden om afbeeldingen en informatie op een scherm te zetten.
Version: 1.3
Author: Robin Brokmann
*/


add_action( 'init', 'create_topics_nonhierarchical_taxonomy', 0 );

function create_topics_nonhierarchical_taxonomy() {

// creeert de labels voor in Wordpress

    $labels = array(
        'name' => _x( 'schermen', 'taxonomy general name' ),
        'singular_name' => _x( 'schermen', 'taxonomy singular name' ),
        'search_items' =>  __( 'Scermen Zoeken' ),
        'all_items' => __( 'Alle Schermen' ),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __( 'Scherm Bewerken' ),
        'update_item' => __( 'Update Scherm' ),
        'add_new_item' => __( 'Nieuw Scherm Toevoegen' ),
        'new_item_name' => __( 'Nieuw Scherm Naam' ),
        'separate_items_with_commas' => __( 'Scheid schermen met comma`s' ),
        'add_or_remove_items' => __( 'Schermen toevoegen en verwijderen' ),
        'choose_from_most_used' => __( 'Kies uit de meest gebruikte schermen' ),
        'menu_name' => __( 'Schermen' ),
    );

// registreerd de taxonomy

    register_taxonomy('scherm','schermen',array(
        'hierarchical' => false,
        'labels' => $labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        'rewrite' => array( 'slug' => 'scherm' ),
    ));
}

//creeert de custom post type

function custom_post_type()
{

    $labels = array(
        'name' => _x('Narrowcasting', 'Post Type General Name', 'text_domain'),
        'singular_name' => _x('Narrowcasting', 'Post Type Singular Name', 'text_domain'),
        'menu_name' => __('Narrowcasting', 'text_domain'),
        'parent_item_colon' => __('Parent Item:', 'text_domain'),
        'all_items' => __('Alle slides', 'text_domain'),
        'view_item' => __('Bekijken', 'text_domain'),
        'add_new_item' => __('Nieuwe Slide Toevoegen', 'text_domain'),
        'add_new' => __('Nieuwe slide', 'text_domain'),
        'edit_item' => __('Bewerken', 'text_domain'),
        'update_item' => __('Update Item', 'text_domain'),
        'search_items' => __('Zoeken', 'text_domain'),
        'not_found' => __('Geen Slides gevonden', 'text_domain'),
        'not_found_in_trash' => __('Niets gevonden in de prullenbak', 'text_domain'),
    );
    $args = array(
        'label' => __('Narrowcasting', 'text_domain'),
        'description' => __('Post Type voor Narrowcasting', 'text_domain'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'author', 'category'),
        'taxonomies' => array('scherm'),
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

add_action('init', 'custom_post_type', 0);







// Maakt verbinding met de template in de plug-in map inplaatst van het thema

add_filter( 'template_include', 'my_plugin_templates' );
function my_plugin_templates( $template ) {
    $post_types = array( 'narrowcasting' );

    if ( is_singular( $post_types ) && file_exists( plugin_dir_path(__FILE__) . 'templates/single-narrowcasting.php' ) ){
        $template = plugin_dir_path(__FILE__) . 'templates/single-narrowcasting.php';
    }
    if( is_tax('scherm') && file_exists( plugin_dir_path(__FILE__) . 'templates/taxonomy-scherm.php' ) ){
        $template = plugin_dir_path(__FILE__ ).'templates/taxonomy-scherm.php';
    }

    return $template;
}


