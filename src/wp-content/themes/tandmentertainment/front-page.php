<?php
  get_header();
  $homeData = new Home();
?>

    <!-- INTRO -->
    <section class="intro full-width jIntro" style="background-image:url('<?php echo $homeData->get_background_image(); ?>');" id="anchor00">
      <div class="intro__overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
          </div>
        </div>
        <div class="vcenter text-center text-overlay">
          <div class="logo-intro"><img src="<?php echo $homeData->get_icon(); ?>" alt=""></div>
          <?php
            $slides = $homeData->get_slides();
            if(!empty($slides)){
              echo '<div id="owl-main-text" class="owl-carousel">';
              foreach($slides as $slide){
                echo '<div class="item">';
                  echo '<h1 class="primary-title">'.$slide['slide_text'].'</h1>';
                echo '</div>';
              }
              echo '</div>';
            }
          ?>
          <h2 class="subtitle-text"><?php echo $homeData->get_caption();?></h2>
          <div class="voffset50"></div>
          <a href="#anchor05" class="btn btn-invert">Book Now</a>
        </div>
      </div>
    </section>

    <!-- PLAYER -->
    <div class="player horizontal">
      <?php
          $playlists = $homeData->get_music();
          $playlist = $playlists[0];
      ?>
      <div class="container">
        <div class="info-album-player">
          <div class="album-cover" id="bg-image3" style="background-image:url('<?php echo $homeData->get_playlist_image($playlist->ID); ?>');"></div>
          <p class="album-title"><?php echo $playlist->post_title; ?></p>
          <p class="artist-name">itstonimontana</p>
        </div>
        <div class="player-content">
          <audio preload></audio>
          <ol class="playlist">
          <?php
            foreach($playlists as $playlist){
              $tracks = get_field('field_59659cadd9d00',$playlist->ID);
              foreach($tracks as $track){
                echo  '<li><a href="#" data-src="'.$track['track_preview_url'].'"  data-playlistid="'.get_field('field_59657cea15c1b',$playlist->ID).'">'.$track['track_name'].'</a></li>';
              }
            }
          ?>
          </ol>
          <div class="nextprev">
            <span class="prev">prev</span>
            <span class="next">next</span>
          </div>
          <span class="btnloop">loop</span>
        </div>
      </div>
    </div>

    <!-- FEATURED ARTIST -->
    <section class="section featured-artists" id="anchor01">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <div class="voffset70"></div>
            <div class="separator-icon">
              <i class="fa fa-th-large"></i>
            </div>
            <div class="voffset30"></div>
            <p class="pretitle"><?php echo $homeData->get_services_title(); ?></p>
            <div class="voffset20"></div>
            <h2 class="title"> <?php echo $homeData->get_services_subtitle(); ?></h2>
            <div class="voffset80"></div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="voffset20"></div>
            <div class="">
              <?php
                foreach($homeData->get_services() as $service){
                  echo '<div class="gallery-cell col-xs-12 col-sm-6 col-md-6 col-lg-6">';
                    echo '<div class="featured-artist">';
                      echo '<div class="image">';
                        echo '<img src="'.$service['background_image'].'" alt="">';
                      echo '</div>';
                      echo '<div class="rollover" style="background-image:url("'.$service['background_image'].'");">';
                        echo '<div class="services__overlay"></div>';
                        echo '<div class="text">';
                          echo '<h4 class="title-artist">'.$service['label'].'</h4>';
                        echo '</div>';
                      echo '</div>';
                    echo '</div>';
                  echo '</div>';
                }
              ?>
            </div>
          </div>
        </div>
        <div class="featured-artists-btn"><a href="#anchor08" class="btn btn-default">Book Now</a></div>
        <div class="voffset120"></div>
      </div>
    </section>

    <!-- DISCOGRAPHY -->
    <section class="section discography inverse-color" id="anchor02">
      <div id="discography"></div>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <div class="voffset70"></div>
            <div class="separator-icon">
              <i class="fa fa-music"></i>
            </div>
            <div class="voffset30"></div>
            <p class="pretitle"><?php echo $homeData->get_music_subtitle();?></p>
            <div class="voffset20"></div>
            <h2 class="title"><?php echo $homeData->get_music_title();?></h2>
            <div class="voffset80"></div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <ul class="carousel-discography">
              <?php
                foreach($playlists as $playlist){
                  echo '<li class="gallery-cell col-xs-12 col-sm-6 col-md-4">';
                    echo '<div class="info-album" data-id="'.get_field('field_59657cea15c1b',$playlist->ID).'">';
                      echo '<div class="cover open-disc" data-url="">';
                        echo '<img src="'.$homeData->get_playlist_image($playlist->ID).'" alt="'.$playlist->post_title.'" />';
                      echo '</div>';
                      echo '<p class="album">'.$playlist->post_title.'</p>';
                    echo '</div>';
                  echo '</li>';
                }
              ?>
            </ul>
            <div class="voffset90"></div>
          </div>
        </div>
      </div>
    </section>

    <!-- LATEST MEDIA -->
    <section class="section last-media inverse-color" id="anchor03">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <div class="voffset90"></div>
            <div class="separator-icon">
              <i class="fa fa-picture-o"></i>
            </div>
            <div class="voffset30"></div>
            <p class="pretitle"><?php echo $homeData->get_gallery_subtitle(); ?></p>
            <div class="voffset20"></div>
            <h2 class="title"><?php echo $homeData->get_gallery_title(); ?></h2>
            <div class="voffset50"></div>
          </div>
        </div>
        <!-- gallery -->
        <div class="row">
          <div class="col-md-12">
            <div class="voffset50"></div>
            <div class="thumbnails owl-carousel">
              <?php
                $gallery = $homeData->get_gallery();
                foreach($gallery as $media){
                  //var_dump($media);die;
                  echo '<div class="item">';
                    echo '<div class="thumbnail '.$media['type'].'" >';
                      echo '<img src="'.$media['url'].'" alt="" />';
                      echo '<div class="rollover">';
                        echo '<i class="plus"></i>';
                      echo '</div>';
                    echo '</div>';
                  echo '</div>';
                }
              ?>
            </div>
            <div class="voffset90"></div>
          </div>
        </div>
      </div>
    </section>

    <!-- TESTIMONIAL -->
    <section class="section twitterfeed" id="anchor04">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="testimonials owl-carousel">
                <?php
                  $testimonials = $homeData->get_testimonials();
                  foreach($testimonials as $testimonial){
                    echo '<div class="item">';
                      echo '<div class="testimonial">';
                        echo '<div class="testimonial__inner">';
                          echo '<p class="testimonial__content-text"><i class="fa fa-quote-left"></i> '.$testimonial->post_content.' <i class="fa fa-quote-right"></i></p>';
                          echo '<p class="testimonial__content-person">-- '.$testimonial->post_title.'</p>';
                        echo '</div>';
                      echo '</div>';
                    echo '</div>';
                  }
                ?>
            </div>
          </div>
        </div>
      </div>
    </section>
<?php get_footer(); ?>
