<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); //Open the loop ?>
			
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		
		<section class="entry-content">
			
			<?php 
			if ( has_post_thumbnail() ) {
				the_post_thumbnail( 'medium', array ( 'class' => 'alignleft' ) );
			}
			?>
			
			<?php the_content(); ?>
			
		</section><!-- .entry-content -->	

		<section class="entry-utility">
			<?php echo 'Posted in: ' . get_the_category_list( ', ' ) . '</p>'; ?>
			<?php echo get_the_term_list( $post->ID, 'tutsplus_genre', '<p>Genre(s): ', ', ', '</p>' ); ?>
		</section><!-- .entry-utility -->
		
	</article>

<?php endwhile ; endif; // End the loop. ?>