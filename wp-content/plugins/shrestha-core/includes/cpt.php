<?php
/**
 * Custom Post Types & Taxonomies Registration
 *
 * @package ShresthaCore
 */

if (!defined('ABSPATH')) {
    exit;
}

function shrestha_core_register_cpts() {
    // 1. Statues CPT (Sacred Deity Statues & Sculptures)
    if (!post_type_exists('statue')) {
        $statue_labels = array(
            'name'                  => _x('Statues', 'post type general name', 'shrestha-core'),
            'singular_name'         => _x('Statue', 'post type singular name', 'shrestha-core'),
            'menu_name'             => _x('Statues', 'admin menu', 'shrestha-core'),
            'name_admin_bar'        => _x('Statue', 'add new on admin bar', 'shrestha-core'),
            'add_new'               => _x('Add New Statue', 'statue', 'shrestha-core'),
            'add_new_item'          => __('Add New Sacred Statue', 'shrestha-core'),
            'edit_item'             => __('Edit Statue', 'shrestha-core'),
            'new_item'              => __('New Statue', 'shrestha-core'),
            'view_item'             => __('View Statue', 'shrestha-core'),
            'view_items'            => __('View Statues', 'shrestha-core'),
            'search_items'          => __('Search Statues', 'shrestha-core'),
            'not_found'             => __('No statues found', 'shrestha-core'),
            'not_found_in_trash'    => __('No statues found in Trash', 'shrestha-core'),
            'all_items'             => __('All Statues', 'shrestha-core'),
            'archives'              => __('Statue Archives', 'shrestha-core'),
            'attributes'            => __('Statue Attributes', 'shrestha-core'),
            'insert_into_item'      => __('Insert into statue', 'shrestha-core'),
            'uploaded_to_this_item' => __('Uploaded to this statue', 'shrestha-core'),
            'featured_image'        => __('Statue Main Specimen Photograph', 'shrestha-core'),
            'set_featured_image'    => __('Set statue main photograph', 'shrestha-core'),
            'remove_featured_image' => __('Remove statue photograph', 'shrestha-core'),
            'use_featured_image'    => __('Use as statue photograph', 'shrestha-core'),
        );
        register_post_type('statue', array(
            'labels'             => $statue_labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array('slug' => 'statues', 'with_front' => false),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => 4,
            'menu_icon'          => 'dashicons-universal-access',
            'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'revisions'),
            'show_in_rest'       => true,
        ));
    }

    // 2. Statue Categories / Deity Tradition Taxonomy
    if (!taxonomy_exists('statue_category')) {
        $cat_labels = array(
            'name'              => _x('Deity Traditions & Categories', 'taxonomy general name', 'shrestha-core'),
            'singular_name'     => _x('Deity Category', 'taxonomy singular name', 'shrestha-core'),
            'search_items'      => __('Search Categories', 'shrestha-core'),
            'all_items'         => __('All Categories', 'shrestha-core'),
            'edit_item'         => __('Edit Category', 'shrestha-core'),
            'update_item'       => __('Update Category', 'shrestha-core'),
            'add_new_item'      => __('Add New Category', 'shrestha-core'),
            'new_item_name'     => __('New Category Name', 'shrestha-core'),
            'menu_name'         => __('Statue Categories', 'shrestha-core'),
        );
        register_taxonomy('statue_category', array('statue', 'specimen'), array(
            'hierarchical'      => true,
            'labels'            => $cat_labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array('slug' => 'statue-category'),
            'show_in_rest'      => true,
        ));
    }

    // 3. Sacred Specimens CPT
    if (!post_type_exists('specimen')) {
        $specimen_labels = array(
            'name'               => _x('Sacred Specimens', 'post type general name', 'shrestha-core'),
            'singular_name'      => _x('Sacred Specimen', 'post type singular name', 'shrestha-core'),
            'menu_name'          => _x('Specimens (Shop)', 'admin menu', 'shrestha-core'),
            'add_new'            => _x('Add New Specimen', 'specimen', 'shrestha-core'),
            'add_new_item'       => __('Add New Sacred Specimen', 'shrestha-core'),
            'edit_item'          => __('Edit Specimen', 'shrestha-core'),
            'new_item'           => __('New Specimen', 'shrestha-core'),
            'view_item'          => __('View Specimen', 'shrestha-core'),
            'search_items'       => __('Search Specimens', 'shrestha-core'),
            'not_found'          => __('No specimens found', 'shrestha-core'),
            'not_found_in_trash' => __('No specimens found in Trash', 'shrestha-core'),
        );
        register_post_type('specimen', array(
            'labels'             => $specimen_labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array('slug' => 'specimen'),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => 5,
            'menu_icon'          => 'dashicons-star-filled',
            'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
            'show_in_rest'       => true,
        ));
    }

    // 2. Alloy Type Taxonomy
    if (!taxonomy_exists('alloy_type')) {
        $alloy_labels = array(
            'name'              => _x('Alloy Types', 'taxonomy general name', 'shrestha-core'),
            'singular_name'     => _x('Alloy Type', 'taxonomy singular name', 'shrestha-core'),
            'search_items'      => __('Search Alloy Types', 'shrestha-core'),
            'all_items'         => __('All Alloy Types', 'shrestha-core'),
            'edit_item'         => __('Edit Alloy Type', 'shrestha-core'),
            'update_item'       => __('Update Alloy Type', 'shrestha-core'),
            'add_new_item'      => __('Add New Alloy Type', 'shrestha-core'),
            'new_item_name'     => __('New Alloy Type Name', 'shrestha-core'),
            'menu_name'         => __('Alloy Types', 'shrestha-core'),
        );
        register_taxonomy('alloy_type', array('statue', 'specimen'), array(
            'hierarchical'      => true,
            'labels'            => $alloy_labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array('slug' => 'alloy-type'),
            'show_in_rest'      => true,
        ));
    }

    // 3. Master Artisans CPT
    if (!post_type_exists('artisan')) {
        $artisan_labels = array(
            'name'               => _x('Master Artisans', 'post type general name', 'shrestha-core'),
            'singular_name'      => _x('Master Artisan', 'post type singular name', 'shrestha-core'),
            'menu_name'          => _x('Artisans', 'admin menu', 'shrestha-core'),
            'add_new'            => _x('Add New Artisan', 'artisan', 'shrestha-core'),
            'add_new_item'       => __('Add New Master Artisan', 'shrestha-core'),
            'edit_item'          => __('Edit Artisan', 'shrestha-core'),
            'new_item'           => __('New Artisan', 'shrestha-core'),
            'view_item'          => __('View Artisan', 'shrestha-core'),
            'search_items'       => __('Search Artisans', 'shrestha-core'),
        );
        register_post_type('artisan', array(
            'labels'             => $artisan_labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array('slug' => 'artisan'),
            'capability_type'    => 'post',
            'has_archive'        => false,
            'hierarchical'       => false,
            'menu_position'      => 6,
            'menu_icon'          => 'dashicons-hammer',
            'supports'           => array('title', 'editor', 'thumbnail', 'custom-fields'),
            'show_in_rest'       => true,
        ));
    }

    // 4. Patron Reviews CPT
    if (!post_type_exists('testimonial')) {
        $testimonial_labels = array(
            'name'               => _x('Patron Reviews', 'post type general name', 'shrestha-core'),
            'singular_name'      => _x('Patron Review', 'post type singular name', 'shrestha-core'),
            'menu_name'          => _x('Patron Reviews', 'admin menu', 'shrestha-core'),
            'add_new'            => _x('Add New Review', 'testimonial', 'shrestha-core'),
            'add_new_item'       => __('Add New Patron Review', 'shrestha-core'),
            'edit_item'          => __('Edit Review', 'shrestha-core'),
            'search_items'       => __('Search Reviews', 'shrestha-core'),
        );
        register_post_type('testimonial', array(
            'labels'             => $testimonial_labels,
            'public'             => true,
            'publicly_queryable' => false,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => false,
            'capability_type'    => 'post',
            'has_archive'        => false,
            'hierarchical'       => false,
            'menu_position'      => 7,
            'menu_icon'          => 'dashicons-awards',
            'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'revisions'),
            'show_in_rest'       => true,
        ));
    }
}
add_action('init', 'shrestha_core_register_cpts', 5);
