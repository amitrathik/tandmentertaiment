/* Loading */
$(window).load(function() {
  $(".loader").delay(500).fadeOut();
  $("#mask").delay(1000).fadeOut("slow");
  $("body").addClass("loaded");
});



/*----------------------------------------------
            P L A Y E R   I N T R O
------------------------------------------------*/
$(function() {

  function loadAudio() {
    // Setup the player to autoplay the next track
    var a = audiojs.createAll({
      trackEnded: function() {
        var next = $('ol.playlist li.playing').next();
        if (!next.length) next = $('ol.playlist li').first();
        next.addClass('playing').siblings().removeClass('playing');
        audio.load($('a', next).attr('data-src'));
        audio.play();
      }
    });

    function loadTrack(trackEl){
      let playlistid = trackEl.find('a').data('playlistid');
      let album = $('body').find('.info-album[data-id="'+playlistid+'"]');
      let img = album.find('.cover img');
      let title = album.find('.album').text();
      let background = img[0].currentSrc;
      $('.player .album-cover').css('background-image','url('+ background +')');
      $('.player .album-title').text(title);
    }

    // Load in the first track
    var audio = a[0];
        first = $('ol.playlist a').attr('data-src');
    $('ol.playlist li').first().addClass('playing');
    audio.load(first);

    // Load in a track on click
    $('ol.playlist li').click(function(e) {
      e.preventDefault();
      $(this).addClass('playing').siblings().removeClass('playing');
      audio.load($('a', this).attr('data-src'));
      audio.play();
    });

    $('.nextprev .next').click(function(e) {
        e.preventDefault();
        var next = $('ol.playlist li.playing').next();
        if (!next.length) next = $('ol.playlist li').first();
        loadTrack(next);
        next.click();
    });
    $('.nextprev .prev').click(function(e) {
        var prev = $('ol.playlist li.playing').prev();
        if (!prev.length) prev = $('ol.playlist li').last();
        loadTrack(prev);
        prev.click();
    });

    $('.btnloop').click(function(e) {
        if ($('audio').attr('loop')) {
            $('audio').removeAttr('loop');
            $(this).removeClass('active');
        } else {
            $('audio').attr('loop', 0);
            $(this).addClass('active');
        }
    });

    $('body').on('click','.info-album',{},function(e){
      let albumId = $(this).data('id');
      let firstTrack = $('body').find('ol.playlist li a[data-playlistid='+albumId+']');
      $(firstTrack).parent().first().trigger('click');
      loadTrack(firstTrack.parent());
    });
  }

  if ($('.player').length>0 ) {
    loadAudio();
  };

});
/*----------------------------------------------
            HERO SLIDER
------------------------------------------------*/
$(document).ready(function(){
  $("#owl-main-text").owlCarousel({
    items:1,
    center:true,
    loop:true,
    autoplay:true,
    autoplayTimeout:3000,
  });
});
/*----------------------------------------------
                 P A R A L L A X
------------------------------------------------*/
if(jQuery().parallax) {
    jQuery('.parallax-section').parallax();
}

/*----------------------------------------------
            M E N U   A N C H O R S
------------------------------------------------*/
  $('a[href*=#]').click(function() {
   if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') && location.hostname === this.hostname) {
     var $target = $(this.hash);
     $target = $target.length && $target || $('[name=' + this.hash.slice(1) +']');
     if ($target.length) {
       var targetOffset = $target.offset().top;
        $('html,body').animate({scrollTop: targetOffset-42}, 1000);

        // collapse nav
        $('.navbar-collapse.in').removeClass('in').addClass('collapse');

        return false;
      }
    }
  });
/*----------------------------------------------
            M E N U   F I X E D
------------------------------------------------*/
$(function() {
  $(window).bind("scroll", function(){
      if ($(window).scrollTop() >= 85) {
          $('#jHeader').addClass('overflow');
      } else {
          $('#jHeader').removeClass('overflow');
      }
      if ($(window).scrollTop() >= ($('.jIntro').height()/2)) {
          $('#jHeader').addClass('fixed');
      } else {
          $('#jHeader').removeClass('fixed');
      }
  });
  $(".menu-item.menu-item-has-children > a").on('click', function(e){
	  e.preventDefault();
	 $(this).parent().toggleClass('open-submenu');
  });

});

/*----------------------------------------------
                 TESTIMONIALS
------------------------------------------------*/
$(document).ready(function(){
  $(".testimonials").owlCarousel({
   items:1,
   center:true,
   loop:true,
   autoplay:true,
   autoplayTimeout:10000,
  });
  $(".thumbnails").owlCarousel({
   items:2,
   margin : 30,
   loop:true,
   autoplay:true,
   autoplayTimeout:5000,
  });
});
