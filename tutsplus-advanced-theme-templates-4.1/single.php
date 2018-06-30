<?php
/* The file for displaying single posts */
?>

<?php get_header(); ?>
		
	<div class="main">
		
		<div id="content" class="two-thirds left">

			<?php 
				
			if( is_singular( 'tutsplus_book' ) ) {
				get_template_part( 'includes/loop', 'book' );
			}
			else {
				get_template_part( 'includes/loop', 'single' );
			}
			
			?>

		</div><!-- #content -->

		
<?php get_sidebar(); ?>

<?php get_footer(); ?>

