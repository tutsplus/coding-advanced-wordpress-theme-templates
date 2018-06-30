<?php
/* The file for displaying single posts of the book post type */
?>

<?php get_header(); ?>
		
	<div class="main">
		
		<div id="content" class="two-thirds left">

			<?php get_template_part( 'includes/loop', 'book' ); ?>

		</div><!-- #content -->

		
<?php get_sidebar(); ?>

<?php get_footer(); ?>

