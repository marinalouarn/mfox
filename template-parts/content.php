<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package M-FOX
 */

?>

<article id="post-<?php the_ID(); ?>" class="item">
	<header>
		<?php 
		the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
	</header><!-- .entry-header -->


	<div class="thumbnail">
	<?php the_post_thumbnail( 'large' );  ?>
	</div>
	
	

	
</article><!-- #post-<?php the_ID(); ?> -->
