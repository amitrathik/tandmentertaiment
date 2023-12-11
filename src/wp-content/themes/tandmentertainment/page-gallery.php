<?php
//	Template Name: Gallery Page
?>
<?php

get_header();
?>
<!-- INTRO -->
<section class="intro full-width " style="background-image:url('<?php echo get_the_post_thumbnail_url();?>');" id="anchor00">
	<div class="intro__overlay"></div>
	<div class="container">
		<div class="vcenter text-center text-overlay">
			<h2 class="subtitle-text"><?php echo get_the_title(); ?></h2>
			<div class="voffset50"></div>
		</div>
	</div>
</section>
<section class="section featured-artists">
	<div class="container">
	<?php 
		if(have_posts()) : 
			while(have_posts()) : 
				the_post(); 
				the_content(); 
			endwhile;
		endif;
	?>
	</div>
</section>

<?php
get_footer();


?>