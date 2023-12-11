<?php
add_action('rest_api_init',function(){
  $global_permissions_callback = function(){
    return true;
  };
  // endpoint to sync playlists
  register_rest_route('v1', '/sync/playlists',[
      'method' => 'GET',
      'permission_callback' => $global_permissions_callback,
      'callback' => function(){
        $sync_playlists = new Sync_Playlists();
        return $sync_playlists->sync();
      }
  ]);
});
?>
