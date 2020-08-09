<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Watanabestore
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
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'watanabestore' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="roof"></div><!-- .roof -->
		<div class="header-wrapper">
			<div class="header-top">
				<div class="header-top-inner-wrapper">
					<p class="est" lang="en">Since 1958</p>
					<!-- Top Banner Nav -->
					<div class = "top-banner">
						<?php if( function_exists( 'get_field' ) ):
							$topBanner_jp = get_field('header_banner_jp', 'option');
							$topBanner_en = get_field('header_banner_en', 'option');
							$locale = get_locale();
							if($locale == 'ja'){
								echo $topBanner_jp;
							}elseif($locale == 'en_US'){
								echo $topBanner_en;
							}
						endif;?>
					</div>

				<?php echo do_shortcode('[bogo]'); ?>
				</div><!-- .header-top-inner-wrapper-->
			</div>
			<!-- .header-top-->
			<div class="header-bottom">
				<div class="header-bottom-wrapper">
					<div class="site-branding">
						<?php the_custom_logo();?>
							<h1 class="site-title">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<?php if( function_exists( 'get_field' ) ):
									$logo_jp = get_field('logo_jp', 'option');
									$logo_en = get_field('logo_en', 'option');
									$locale = get_locale();
									$image_jp = wp_get_attachment_image_src($logo_jp);
									$image_en = wp_get_attachment_image_src($logo_en);
									if($locale == 'ja'){
									?>
										<div class="logo-wrapper">
											<img src="<?php if( $image_jp[0] ) { echo $image_jp[0]; } ?>"/>
										</div>
									<?php
									}elseif($locale == 'en_US'){ ?>
										<div class="logo-wrapper">
											<img src="<?php if( $image_en[0] ) { echo $image_en[0]; } ?>"/>
										</div>
									<?php
									} 
									endif; ?>
								</a>
							</h1>
					</div><!-- .site-branding -->
				
					<nav id="site-navigation" class="main-navigation">
						<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'watanabestore' ); ?></button>
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
							)
						);
						?>
					</nav><!-- #site-navigation -->
				</div><!-- .header-bottom-wrapper -->
			</div><!-- .header-bottom -->
		</div><!-- .header-wrapper -->
	</header><!-- #masthead -->
