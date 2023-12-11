<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tandmentertainment
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">
<?php wp_head(); ?>
</head>

<body data-spy="scroll" data-target="#navbar-muziq" data-offset="80">
    <!-- LOADER -->
    <div id="mask">
        <div class="loader">
          <div class="cssload-container">
            <div class="cssload-shaft1"></div>
            <div class="cssload-shaft2"></div>
            <div class="cssload-shaft3"></div>
            <div class="cssload-shaft4"></div>
            <div class="cssload-shaft5"></div>
            <div class="cssload-shaft6"></div>
            <div class="cssload-shaft7"></div>
            <div class="cssload-shaft8"></div>
            <div class="cssload-shaft9"></div>
            <div class="cssload-shaft10"></div>
        </div>
        </div>
    </div>

    <!-- HEADER -->
    <header id="jHeader">
      <nav class="navbar navbar-default" role="navigation">

        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Menu</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo home_url();?>"><h3>T&amp;M Entertainment</h3></a>
        </div>
		<?php
			wp_nav_menu([
				'menu' => 'header-menu',
				'menu_class' => 'nav navbar-nav navbar-right',
				'container_class' => 'collapse navbar-collapse navbar-ex1-collapse',
				'container_id' => 'navbar-muziq'
			]); 
		?>
      </nav>
    </header>
