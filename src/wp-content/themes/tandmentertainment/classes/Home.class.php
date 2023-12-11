<?php

class Home {
  public function __constructor(){}

  public function get_background_image(){
    return get_field('field_59547c3227c37');
  }

  public function get_icon(){
    return get_field('field_59548291be89b');
  }

  public function get_slides(){
    return get_field('field_59547ca327c38');
  }

  public function get_caption(){
    return get_field('field_59547e0627c3a');
  }

  public function get_services_title(){
    return get_field('field_5955b42a6e872');
  }

  public function get_services_subtitle(){
    return get_field('field_5955b4346e873');
  }

  public function get_services(){
    return get_field('field_5955b4876e874');
  }

  public function get_gallery_title(){
    return get_field('field_5961ac9e74a7e');
  }

  public function get_gallery_subtitle(){
    return get_field('field_5961acd174a7f');
  }

  public function get_gallery(){
    return get_field('field_5961acf374a80');
  }

  public function get_music_title(){
    return get_field('field_5966cb0e95756');
  }

  public function get_music_subtitle(){
    return get_field('field_5966cb1995757');
  }

  public function get_music(){
    return get_field('field_5966cb2595758');
  }

  public function get_playlist_image($playlistId){
    $images = get_field('field_59657d5e15c1c',$playlistId);
    return $images[0]['url'];
  }

  public function get_testimonials(){
    return get_field('field_5966d515f46f2');
  }

 
}

?>
