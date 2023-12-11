(function($){
  $(document).ready(function(){
    console.log(tandmentertainment_data.home_url + '/wp-json/v1/sync/playlists');
    $('body').on('click','#js-sync',{},function(evt){
      evt.preventDefault();
      // make request
      $('#js-sync').replaceWith('<div><p>Syncing playlists...</p></div>');
      $.ajax({
        type : "GET",
        url : tandmentertainment_data.home_url + '/wp-json/v1/sync/playlists'
      }).done(function(response){
        location.reload();
      });
    });
  });
})(jQuery);
