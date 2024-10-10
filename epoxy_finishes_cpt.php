<?php
/*
Plugin Name: Epoxy Finishes CPT
Description: Adds a custom post type for Epoxy Finishes and a custom taxonomy for Finish Types.
Version: 1.0
Author: Tim Baines
*/

// Register Custom Post Type for Epoxy Finishes
function create_epoxy_finishes_cpt() {
    $labels = array(
        'name'                  => 'Epoxy Finishes',
        'singular_name'         => 'Epoxy Finish',
        'menu_name'             => 'Epoxy Finishes',
        'name_admin_bar'        => 'Epoxy Finish',
        'add_new'               => 'Add New',
        'add_new_item'          => 'Add New Epoxy Finish',
        'new_item'              => 'New Epoxy Finish',
        'edit_item'             => 'Edit Epoxy Finish',
        'view_item'             => 'View Epoxy Finish',
        'all_items'             => 'All Epoxy Finishes',
        'search_items'          => 'Search Epoxy Finishes',
        'not_found'             => 'No epoxy finishes found.',
        'not_found_in_trash'    => 'No epoxy finishes found in Trash.',
    );

    $args = array(
        'labels'                => $labels,
        'public'                => true,
        'has_archive'           => true,
        'rewrite'               => array('slug' => 'epoxy-finishes'),
        'supports'              => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'menu_icon'             => 'dashicons-admin-tools',
        'show_in_rest'          => true,
        'hierarchical'          => false,
        'capability_type'       => 'post',
        'menu_position'         => 5,
    );

    register_post_type('epoxy_finishes', $args);
}
add_action('init', 'create_epoxy_finishes_cpt');

// Register Custom Taxonomy for Finish Types
function create_finish_types_taxonomy() {
    $labels = array(
        'name'              => 'Finish Types',
        'singular_name'     => 'Finish Type',
        'search_items'      => 'Search Finish Types',
        'all_items'         => 'All Finish Types',
        'parent_item'       => 'Parent Finish Type',
        'parent_item_colon' => 'Parent Finish Type:',
        'edit_item'         => 'Edit Finish Type',
        'update_item'       => 'Update Finish Type',
        'add_new_item'      => 'Add New Finish Type',
        'new_item_name'     => 'New Finish Type Name',
        'menu_name'         => 'Finish Types',
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array(
            'slug' => 'epoxy-finishes',
            'with_front' => false,
            'hierarchical' => true,
        ),
        'show_in_rest'      => true,
    );

    register_taxonomy('finish_types', array('epoxy_finishes'), $args);
}
add_action('init', 'create_finish_types_taxonomy');
