<?php
  show_admin_bar( false );

  foreach ( glob( plugin_dir_path( __FILE__ ) . "classes/*.php" ) as $file ) {
    include_once $file;
  }
  foreach ( glob( plugin_dir_path( __FILE__ ) . "objects/*.php" ) as $file ) {
    include_once $file;
  }
  foreach ( glob( plugin_dir_path( __FILE__ ) . "functions/*.php" ) as $file ) {
    include_once $file;
  }
  add_theme_support( 'post-thumbnails' );
  // Enqueue Styles & Scripts
  add_action( 'wp_enqueue_scripts', function(){
    // styles
    wp_enqueue_style('material-icons-font','//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic');
    wp_enqueue_style('bootstrap-css',  get_template_directory_uri(). '/assets/css/vendor/bootstrap.css');
    wp_enqueue_style('font-awesome-css',  get_template_directory_uri(). '/assets/css/vendor/font-awesome.min.css');
    wp_enqueue_style('owl-carousel-css',  get_template_directory_uri(). '/assets/css/vendor/owl.carousel.css');
    wp_enqueue_style('owl-theme-css',  get_template_directory_uri(). '/assets/css/vendor/owl.theme.default.css');
    wp_enqueue_style('swipe-box-css',  get_template_directory_uri(). '/assets/css/vendor/swipebox.min.css');
    wp_enqueue_style('theme-stylesheet', get_stylesheet_uri());
    wp_enqueue_style('theme-red-css',  get_template_directory_uri(). '/assets/css/colors/color-red.css');
    // scripts
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/js/vendor/jquery.js',array(),'',false);
    wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/vendor/modernizr.js', array(),'', false );
    wp_enqueue_script( 'audio', get_template_directory_uri() . '/assets/js/vendor/audio.min.js', array(),'', false );
    wp_enqueue_script( 'isotope', get_template_directory_uri() . '/assets/js/vendor/isotope.pkgd.min.js', array(),'', false );
    wp_enqueue_script( 'swipebox', get_template_directory_uri() . '/assets/js/vendor/jquery.swipebox.min.js', array(),'', false );
    wp_enqueue_script( 'owl-carousel-js', get_template_directory_uri() . '/assets/js/vendor/owl.carousel.min.js', array(),'', false );
    wp_enqueue_script( 'parallax', get_template_directory_uri() . '/assets/js/vendor/jquery.parallax.min.js', array(),'', false );
    wp_enqueue_script( 'main-js', get_template_directory_uri() . '/assets/js/main.js', array(),'', false );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/vendor/bootstrap.js', array(),'', false );
  });

  function register_my_menu() {
	register_nav_menu('header-menu',__( 'Header Menu' ));
  }
  add_action( 'init', 'register_my_menu' );

  add_filter('acf/settings/save_json', function($path){
    // update path
    $path = get_stylesheet_directory() . '/acfs/json';
    // return
    return $path;
  });

  add_filter('acf/settings/load_json', function($paths){
    // remove original path (optional)
    unset($paths[0]);
    // append path
    $paths[] = get_stylesheet_directory() . '/acfs/json';
    // return
    return $paths;
  });

  if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'redirect'		=> false
	));	
  }

  add_action('admin_enqueue_scripts',function($hook){
    wp_enqueue_script('tandmentertainment_playlist_js', get_template_directory_uri() . '/admin/js/sync.js');
    wp_localize_script('tandmentertainment_playlist_js','tandmentertainment_data',['home_url' => home_url()]);
  });

  add_filter('after_list_headline-playlist',function(){
    return '<a href="#" class="page-title-action">Sync Playlists</a>';
  });

  add_action('admin_head', function(){
    ?>
    <script>
    jQuery(function(){
        jQuery("body.post-type-playlist .wrap h1").append('<a href="#" id="js-sync" class="page-title-action">Sync Playlists</a>');
    });
    </script>
    <?php
  });
?>
