<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Watanabestore
 */

get_header();
?>

	<main id="primary" class="site-main">

		<section class="error-404 not-found">
			<header class="page-header">
				<h1 class="page-title">
				<div class="close-icon">
				<img src="<?php bloginfo('template_url'); ?>/images/icons/404/close.svg" alt="">
				</div>
				<span>404</span>
				<?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'watanabestore' ); ?>
				</h1>
			</header><!-- .page-header -->

			<div class="page-content">
				


			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<div class="back-cta">Back to Home</div>
			</a>

			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
