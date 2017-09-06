<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentyfifteen' ); ?></a>

	<div id="sidebar" class="sidebar">
		<header id="masthead" class="site-header" role="banner">
			<div class="site-branding">
				<?php
					twentyfifteen_the_custom_logo();
				?>
				<div id="gravatar-logo" class="gravatar-logo">
				<?php
					if ( has_custom_logo() ) {
						$image = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
						$title = esc_attr( get_bloginfo( 'title' ) );
						echo '<img class="logo" src="' . esc_url( $image[0] ) . '" title="' . esc_attr( $title ) . '" alt="' . esc_attr( $title ) . '"/>';
					} elseif ( get_theme_mod( 'twentyxkon_gravatar' ) ) {
						$admin_email = get_theme_mod( 'twentyxkon_gravatar' );
						$default = 'gravatar_default';
						$title = esc_attr( get_bloginfo( 'title' ) );
						echo get_avatar( $admin_email, '100', null, esc_attr( $title ),
							array(
								'class' => array( 'img-circle' ),
							)
						);
					} else {
						$admin_email = get_option( 'admin_email' );
						$title = esc_attr( get_bloginfo( 'title' ) );
						echo get_avatar( $admin_email, '100', null, esc_attr( $title ),
							array(
								'class' => array( 'img-circle' ),
							)
						);
					}
				?>
				</div>
				<?php
					if ( is_front_page() && is_home() ) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php endif;

					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
						<p class="site-description"><?php echo $description; ?></p>
					<?php endif;
				?>
				<?php
				if ( 'yes' == get_theme_mod( 'twentyxkon_sm_show_details' ) ) {
					?>
					<div class="contact-details">
						<?php
						if ( get_theme_mod( 'twentyxkon_sm_birthdate' ) ) {
							echo '<i class="fa fa-calendar"></i> ' . esc_attr( get_theme_mod( 'twentyxkon_sm_birthdate' ) ) . '</br>';
						}
						if ( get_theme_mod( 'twentyxkon_sm_address' ) ) {
							echo '<i class="fa fa-map-marker"></i> ' . esc_attr( get_theme_mod( 'twentyxkon_sm_address' ) ) . '</br>';
						}
						if ( get_theme_mod( 'twentyxkon_sm_cphone' ) ) {
							echo '<i class="fa fa-phone"></i> <a href="tel:' . esc_attr( get_theme_mod( 'twentyxkon_sm_cphone' ) ) . '" title="' . esc_attr( get_theme_mod( 'twentyxkon_sm_cphone' ) ) . '">' . esc_attr( get_theme_mod( 'twentyxkon_sm_cphone' ) ) . '</a></br>';
						}
						if ( get_theme_mod( 'twentyxkon_sm_cemail' ) ) {
							echo '<i class="fa fa-envelope-o"></i> <a href="mailto:' . esc_attr( get_theme_mod( 'twentyxkon_sm_cemail' ) ) . '" title="' . esc_attr( get_theme_mod( 'twentyxkon_sm_cemail' ) ) . '">' . esc_attr( get_theme_mod( 'twentyxkon_sm_cemail' ) ) . '</a></br>';
						}
						if ( get_theme_mod( 'twentyxkon_sm_cskype' ) ) {
							echo '<i class="fa fa-skype"></i> ' . esc_attr( get_theme_mod( 'twentyxkon_sm_cskype' ) );
						}
						?>
					</div>
					<?php
				}
				if ( 'yes' == get_theme_mod( 'twentyxkon_sm_show_sicons' ) ) {
					?>
					<div class="social-media-icons">
						<?php
						if ( get_theme_mod( 'twentyxkon_sm_wp' ) ) {
							echo '<a href="' . esc_url( get_theme_mod( 'twentyxkon_sm_wp' ) ) . '" title="' . esc_attr( 'Find me on WordPress', 'twentyxkon' ) . '"><i class="fa fa-wordpress"></i></a>';
						}
						if ( get_theme_mod( 'twentyxkon_sm_git' ) ) {
							echo ' <a href="' . esc_url( get_theme_mod( 'twentyxkon_sm_git' ) ) . '" title="' . esc_attr( 'Find me on GitHub', 'twentyxkon' ) . '"><i class="fa fa-github"></i></a>';
						}
						if ( get_theme_mod( 'twentyxkon_sm_in' ) ) {
							echo ' <a href="' . esc_url( get_theme_mod( 'twentyxkon_sm_in' ) ) . '" title="' . esc_attr( 'Find me on LinkedIn', 'twentyxkon' ) . '"><i class="fa fa-linkedin"></i></a>';
						}
						if ( get_theme_mod( 'twentyxkon_sm_da' ) ) {
							echo ' <a href="' . esc_url( get_theme_mod( 'twentyxkon_sm_da' ) ) . '" title="' . esc_attr( 'Find me on DeviantArt', 'twentyxkon' ) . '"><i class="fa fa-deviantart"></i></a>';
						}
						if ( get_theme_mod( 'twentyxkon_sm_fb' ) ) {
							echo ' <a href="' . esc_url( get_theme_mod( 'twentyxkon_sm_fb' ) ) . '" title="' . esc_attr( 'Find me on Facebook', 'twentyxkon' ) . '"><i class="fa fa-facebook"></i></a>';
						}
						if ( get_theme_mod( 'twentyxkon_sm_tt' ) ) {
							echo ' <a href="' . esc_url( get_theme_mod( 'twentyxkon_sm_tt' ) ) . '" title="' . esc_attr( 'Find me on Twitter', 'twentyxkon' ) . '"><i class="fa fa-twitter"></i></a>';
						}
						if ( get_theme_mod( 'twentyxkon_sm_ig' ) ) {
							echo ' <a href="' . esc_url( get_theme_mod( 'twentyxkon_sm_ig' ) ) . '" title="' . esc_attr( 'Find me on Instagram', 'twentyxkon' ) . '"><i class="fa fa-instagram"></i></a>';
						}
						if ( get_theme_mod( 'twentyxkon_sm_gp' ) ) {
							echo ' <a href="' . esc_url( get_theme_mod( 'twentyxkon_sm_gp' ) ) . '" title="' . esc_attr( 'Find me on Google+', 'twentyxkon' ) . '"><i class="fa fa-google-plus"></i></a>';
						}
						?>
					</div>
					<?php
				}
				?>
				<button class="secondary-toggle"><?php _e( 'Menu and widgets', 'twentyfifteen' ); ?></button>
			</div><!-- .site-branding -->
		</header><!-- .site-header -->

		<?php get_sidebar(); ?>
	</div><!-- .sidebar -->

	<div id="content" class="site-content">
