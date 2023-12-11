	<?php  $footerData = new Footer(); ?>
	<!-- CONTACTS -->
	<section class="section inverse-color contact" id="anchor05">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <div class="voffset70"></div>
            <div class="separator-icon">
              <i class="fa fa fa-microphone"></i>
            </div>
            <div class="voffset30"></div>
            <p class="pretitle"><?php echo $footerData->get_contact_subtitle(); ?></p>
            <div class="voffset20"></div>
            <h2 class="title"><?php echo $footerData->get_contact_title();?></h2>
            <div class="voffset80"></div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 col-md-7">
              <?php gravity_form(1, false, false, false, '', false ,0);?>
              <div class="voffset80"></div>
          </div>
          <div class="col-sm-6 col-md-5">
            <div class="col-contact">
              <ul class="contact">
                <li><i class="fa fa-phone"></i> <a href="tel:<?php echo $footerData->get_contact_phone(); ?>"><?php echo $footerData->get_contact_phone(); ?></a></li>
                <li><i class="fa fa-envelope"></i> <?php echo $footerData->get_contact_email();?></li>
              </ul>
              <?php
                $social_media_links = $footerData->get_social_media_links();
                if(!empty($social_media_links)){
              ?>
                  <h4 class="title small"><?php //echo $homeData->get_social_media_title(); ?></h4>
                  <ul class="social-links">
                    <?php
                      foreach($social_media_links as $data){
                        echo '<li><a href="'.$data['link'].'"><i class="fa fa-'.$data['Icon'].'"></i></a></li>';
                      }
                    ?>
                  </ul>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- FOOTER -->
    <footer>
      <div class="container">
        <p class="copy">© <?php echo the_time('Y');?>. All Rights Reserved. | <a href="<?php echo home_url('/sitemap_index.xml');?>">Sitemap</a></p>
      </div>
    </footer>
</body>
