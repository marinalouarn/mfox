<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package M-FOX
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$m_fox_description = get_bloginfo( 'description', 'display' );
			if ( $m_fox_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $m_fox_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<ul>
			<?php

$items = wp_get_nav_menu_items('menu-1'); //replace menu_name with menu-name, menu-id, menu-slug (menu-location is not valid!)
foreach((array) $items as $key => $item) {
	$taxonomy = $item->object;
	$term_id = $item->object_id;
	$url = $item->url;
	$title = $item->title;
	$image_url= get_field( 'icon', $item ); //replace "icoon" with the fieldname you give to the image
	echo '<li><a href="'.$url.'" title="'.$title.'"><img src="'.$image_url.'" /></a></li>'; //replace large with size you wish
}
			?>
		</ul>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
