<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Watanabestore
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php watanabestore_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'watanabestore' ),
				'after'  => '</div>',
			)
		);
		?>
		<div class="contact" id="contact">
			<div class="contact-wrapper">
				<div class="cicon icon1"></div><!-- .sicon1-->
				<div class="contact-info">
					<div class="hang"></div><!-- .hang-->
				<?php $locale = get_locale(); 
					if($locale == 'ja'):?>
						<div class="contact-text-wrapper text-jp">
							<h3 lang="ja">配達依頼・問い合わせはコチラ</h3>
				<?php elseif($locale == 'en_US'):?>
						<div class="contact-text-wrapper text-en">
							<h3 lang="en">Contact Us</h3>
						<?php endif;?>
							<p>TEL: 047-464-3312</p>
							<p>FAX: 047-464-3337</p>
						</div><!-- .contact-text-wrapper-->
					</div><!-- .contact-info-->
				<div class="cicon icon2"></div><!-- .sicon2-->
			</div><!-- .contact-wrapper-->
		</div> <!-- .contact-->
		<div class="flower"></div><!-- .flower-->
	</div><!-- .entry-content -->
	
	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'watanabestore' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
