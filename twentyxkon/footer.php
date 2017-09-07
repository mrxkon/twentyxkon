<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

	</div><!-- .site-content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<?php
				/**
				 * Fires before the Twenty Fifteen footer text for footer customization.
				 *
				 * @since Twenty Fifteen 1.0
				 */
				do_action( 'twentyfifteen_credits' );
				$siteurl = get_bloginfo('url');
			?>
			&copy; <a href="<?php echo $siteurl; ?>">Xenos (xkon) Konstantinos</a> - <a href="https://github.com/mrxkon/twentyxkon">This theme</a> is based on <a href="https://wordpress.org/themes/twentyfifteen/">Twenty Fifteen</a><br/>
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'twentyfifteen' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'twentyfifteen' ), 'WordPress' ); ?></a>
		</div><!-- .site-info -->
	</footer><!-- .site-footer -->

</div><!-- .site -->
<div id="to-top">
	<a href="#top" id="smoothup" title="Back to top"><img alt="Back to Top" src="<?php echo get_stylesheet_directory_uri(); ?>/img/backtotop.png"/></a>
</div>
<?php wp_footer(); ?>

</body>
</html>
