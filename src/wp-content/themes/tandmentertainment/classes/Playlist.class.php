<?php

class Playlist{
  public $access_token = null;

  public function __construct(){}

  public function get_playlists(){
    // cannot make call without an access token
    if($this->access_token === null){
      $this->get_token();
    }
    // get playlists
    $response = wp_remote_request('https://api.spotify.com/v1/users/itstonimontana/playlists/',[
      'method' => 'GET',
      'headers' => [
         'Authorization' => 'Bearer '.$this->access_token,
        ]
    ]);
    // response success
    if( !is_wp_error( $response ) && wp_remote_retrieve_response_code($response) == 200 ){
       $body = json_decode($response['body'],true);
       if(!empty($body['items'])){
         foreach($body['items'] as $playlist){
           // check if playlist already exists by id
           $query = get_posts([
             'post_type' => 'playlist',
             'post_status' => 'publish',
             'posts_per_page' => 1,
             'meta_query' => [
                [
                  'key' => 'playlist_id',
                  'value' => $playlist['id'],
                  'compare' => '='
                ]
              ]
           ]);
           // create or update a playlist cpt
           $playlistId = wp_insert_post([
              'ID' => !empty($query) ? $query[0]->ID: 0,
              'post_title' => $playlist['name'],
              'post_status' => 'publish',
              'post_type' => 'playlist',
              'meta_input' => [
                  'playlist_id' => $playlist['id'],
              ]
           ]);
           // update playlist images
           update_field('field_59657d5e15c1c',$playlist['images'],$playlistId);
           // update playlist tracks
           update_field('field_59659cadd9d00',$this->get_tracks($playlist['id']), $playlistId );
         }
       }
    }
  }

  public function get_tracks($playlistId){
    // cannot make requests if access token is null
    if($this->access_token === null){
      $this->get_token();
    }
    // initialize tracks array;
    $tracks = [];
    // get playlist data
    $response = wp_remote_request('https://api.spotify.com/v1/users/itstonimontana/playlists/'.$playlistId,[
      'method' => 'GET',
      'headers' => [
         'Authorization' => 'Bearer '.$this->access_token,
        ]
    ]);
    // success response
    if( !is_wp_error( $response ) && wp_remote_retrieve_response_code($response) == 200 ){
       $body = json_decode($response['body'],true);
       if(!empty($body['tracks'])){
         // add tracks to array if preview url exists
         foreach($body['tracks']['items'] as $data){
           if($data['track']['preview_url'] !== null){
             $tracks[] = [
                'track_name' => $data['track']['name'],
                'track_preview_url' => $data['track']['preview_url']
              ];
           }
         }
       }
     }
     // return tracks
     return $tracks;
  }

  private function get_token(){
    // get access token
    $response = wp_remote_request( 'https://accounts.spotify.com/api/token', [
      'method' => 'POST',
      'headers' => [
        'Authorization' => 'Basic '. $['SPOTIFY_KEY'],
        'Content-Type' => 'application/x-www-form-urlencoded'
      ],
      'body' => [
        'grant_type' => 'client_credentials'
      ]
    ]);
    // update access token
    if( !is_wp_error( $response ) && wp_remote_retrieve_response_code($response) == 200 ){
       $body = json_decode($response['body'],true);
       $this->access_token = $body['access_token'];
    }
  }
}

?>
