<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package M-FOX
 */

get_header();


$categories = get_the_category();
$category_id = $categories[0]->cat_ID;
$post_id = "category_" . $cat ;

?>

	

	<div id="primary" class="content-area">

		<header class="page-header scroll" style="background-image:url('<?php the_field( 'background', $post_id ); ?>');">

			<div>
				<?php 
$value = get_field( "header", $post_id );

if( $value ) {
    ?> <img src="<?php the_field( 'header', $post_id ); ?>"/> <?php
} else {
    echo 'empty';
} ?>
				<div>
				<h1><?php single_term_title(); ?></h1>
				<?php the_archive_description( '<p>', '</p>' );
				?>
				</div>
			</div>
		</header><!-- .page-header -->

		<div class="grid-items">

		<?php if ( have_posts() ) : ?>

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</div>

	</div><!-- #primary -->

<?php

get_footer();
