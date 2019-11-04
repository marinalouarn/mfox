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

	<link href="https://fonts.googleapis.com/css?family=Josefin+Slab:300,400,700&display=swap" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	
<div id="page" class="site">
	

	<header id="masthead" class="site-header">
		

		<nav id="border-nav">
			<ul>
				<li class="left"><button>CONTACT</button></li>
				<li class="right"><button>MENU</button></li>
			</ul>
		</nav>

		<nav id="site-navigation" class="main-navigation">
			<ul>

<?php $items = wp_get_nav_menu_items('menu-1');
foreach((array) $items as $key => $item) {
	if( is_singular('post') ){
		$postId = $_POST['postid'];
		$currentCategory = get_the_category($postId);
		$current = ( $currentCategory[0]->term_id == $item->object_id ) ? 'current' : ''; 
	} else{
		$current = ( $item->object_id == get_queried_object_id() ) ? 'current' : '';		
	}
	$taxonomy = $item->object;
	$term_id = $item->object_id;
	$url = $item->url;
	$title = $item->title;
	$image_url= get_field( 'icon', $item ); 
	echo '<li class="' . $current . '"><a href="'.$url.'" title="'.$title.'"><img src="'.$image_url.'" /></a></li>'; 
} ?>
			</ul>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
