<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<!-- META -->
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <?php get_template_part( 'knack/templates/fav' ); ?>
	<!-- LINK -->
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!-- SETUP -->
	<?php global $post; setup_postdata($post); ?>
	<!-- WP_HEAD -->
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php get_template_part( 'knack/templates/navigation' ); ?>
<?php get_template_part( 'knack/templates/top' ); ?>
<?php get_template_part( 'knack/templates/modal' ); ?>
<?php get_template_part( 'knack/templates/scroll' ); ?>
