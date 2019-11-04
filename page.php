<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package M-FOX
 */

get_header();


?>


	<header class="page-header scroll" style="background-image:url('<?php the_field( 'background' ); ?>');">
		<div>
			<div>
			<h1><?php the_title(); ?></h1>
			<?php the_excerpt(); ?>
			</div>
		</div>
	</header><!-- .page-header -->
	


	


		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );



		endwhile; // End of the loop.
		?>


<?php
get_footer();
