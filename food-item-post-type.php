<?php

class Food_Item_Post_Type {

    public function __construct(){
        add_action( 'init', array( $this, 'register_post_type' ) );
        add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
    }

    public function register_post_type() {
        $labels = array(
            'name'               => _x( 'Food Items', 'post type general name', 'koga-calorytracker' ),
            'singular_name'      => _x( 'Food Item', 'post type singular name', 'koga-calorytracker' ),
            'menu_name'          => _x( 'Food Items', 'admin menu', 'koga-calorytracker' ),
            'name_admin_bar'     => _x( 'Food Item', 'add new on admin bar', 'koga-calorytracker' ),
            'add_new'            => _x( 'Add New', 'food-item', 'koga-calorytracker' ),
            'add_new_item'       => __( 'Add New Food Item', 'koga-calorytracker' ),
            'new_item'           => __( 'New Food Item', 'koga-calorytracker' ),
            'edit_item'          => __( 'Edit Food Item', 'koga-calorytracker' ),
            'view_item'          => __( 'View Food Item', 'koga-calorytracker' ),
            'all_items'          => __( 'All Food Items', 'koga-calorytracker' ),
            'search_items'       => __( 'Search Food Items', 'koga-calorytracker' ),
            'parent_item_colon'  => __( 'Parent Food Items:', 'koga-calorytracker' ),
            'not_found'          => __( 'No food items found.', 'koga-calorytracker' ),
            'not_found_in_trash' => __( 'No food items found in Trash.', 'koga-calorytracker' )
        );

        $args = array(
            'labels'             => $labels,
            'description'        => __( 'Description.', 'koga-calorytracker' ),
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'food-item' ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
        );

        register_post_type( 'food-item', $args );
    }

    public function add_meta_boxes() {
        add_meta_box(
            'calories-information',
            __( 'Calory information', 'koga-calorietracker'),
            array( $this, 'show_calorie_info_box'),
            'food-item',
            'side'
        );
    }

    public function show_calorie_info_box() {
        include_once __DIR__ . '/templates/metaboxes/calorie-information.php';
    }
}