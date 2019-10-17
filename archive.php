<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package M-FOX
 */

get_header();
?>

	

	<div id="primary" class="content-area">

		<header class="page-header">

			<div>
				<h1><?php single_term_title(); ?></h1>
				<?php the_archive_description( '<div class="description">', '</div>' );
				?>
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
get_sidebar();
get_footer();
