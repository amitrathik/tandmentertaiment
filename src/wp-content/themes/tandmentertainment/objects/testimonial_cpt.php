<?php
function register_testimonial_cpt(){
  register_post_type( 'testimonial', array(
    'labels'             => array(
      'name'               => _x( 'Testimonials', 'post type general name', 'tandmentertainment' ),
      'singular_name'      => _x( 'Testimonial', 'post type singular name', 'tandmentertainment' ),
      'menu_name'          => _x( 'Testimonials', 'admin menu', 'tandmentertainment' ),
      'name_admin_bar'     => _x( 'Testimonial', 'add new on admin bar', 'tandmentertainment' ),
      'add_new'            => _x( 'Add New', 'testimonial', 'tandmentertainment' ),
      'add_new_item'       => __( 'Add New Testimonial', 'tandmentertainment' ),
      'new_item'           => __( 'New Testimonial', 'tandmentertainment' ),
      'edit_item'          => __( 'Edit Testimonial', 'tandmentertainment' ),
      'view_item'          => __( 'View Testimonial', 'tandmentertainment' ),
      'all_items'          => __( 'All Testimonials', 'tandmentertainment' ),
      'search_items'       => __( 'Search Testimonials', 'tandmentertainment' ),
      'parent_item_colon'  => __( 'Parent Testimonials:', 'tandmentertainment' ),
      'not_found'          => __( 'No Testimonials found.', 'tandmentertainment' ),
      'not_found_in_trash' => __( 'No Testimonials found in Trash.', 'tandmentertainment' )
    ),
    'description'        => __( 'Description.', 'tandmentertainment' ),
    'public'             => true,
    'publicly_queryable' => false,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'testimonials' ),
    'capability_type'    => 'post',
    'has_archive'        => false,
    'hierarchical'       => false,
    'menu_position'      => 25,
    'menu_icon' => 'dashicons-format-quote',
    'supports'           => array( 'title', 'editor')
  ));
}
?>
