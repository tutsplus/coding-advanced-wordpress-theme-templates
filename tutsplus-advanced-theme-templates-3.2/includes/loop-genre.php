<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); //Open the loop ?>
			
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		
		<section class="entry-content">
			
			<?php 
			if ( has_post_thumbnail() ) {
				the_post_thumbnail( 'medium', array ( 'class' => 'alignleft' ) );
			}
			?>
			
			<?php the_excerpt(); ?>
		</section><!-- .entry-content -->	
		
	</article>

<?php endwhile ; endif; // End the loop. ?>