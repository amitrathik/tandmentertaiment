<?php
function register_playlist_cpt(){
  register_post_type( 'playlist', array(
    'labels'             => array(
      'name'               => _x( 'Playlists', 'post type general name', 'tandmentertainment' ),
      'singular_name'      => _x( 'Playlist', 'post type singular name', 'tandmentertainment' ),
      'menu_name'          => _x( 'Playlists', 'admin menu', 'tandmentertainment' ),
      'name_admin_bar'     => _x( 'Playlist', 'add new on admin bar', 'tandmentertainment' ),
      'add_new'            => _x( 'Add New', 'playlist', 'tandmentertainment' ),
      'add_new_item'       => __( 'Add New Playlist', 'tandmentertainment' ),
      'new_item'           => __( 'New Playlist', 'tandmentertainment' ),
      'edit_item'          => __( 'Edit Playlist', 'tandmentertainment' ),
      'view_item'          => __( 'View Playlist', 'tandmentertainment' ),
      'all_items'          => __( 'All Playlists', 'tandmentertainment' ),
      'search_items'       => __( 'Search Playlists', 'tandmentertainment' ),
      'parent_item_colon'  => __( 'Parent Playlists:', 'tandmentertainment' ),
      'not_found'          => __( 'No playlists found.', 'tandmentertainment' ),
      'not_found_in_trash' => __( 'No playlists found in Trash.', 'tandmentertainment' )
    ),
    'description'        => __( 'Description.', 'tandmentertainment' ),
    'public'             => true,
    'publicly_queryable' => false,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'playlists' ),
    'has_archive'        => false,
    'hierarchical'       => false,
    'menu_position'      => 25,
    'menu_icon' => 'dashicons-playlist-audio',
    'supports'           => array( 'title', 'editor', 'thumbnail')
  ));
}
?>
