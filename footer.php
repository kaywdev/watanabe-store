<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Watanabestore
 */

?>
	<a href="#" class="scrollToTop">
	<?php get_template_part('images/icons/footer/gototop')?>
	</a>

	<footer id="colophon" class="site-footer">
		<div class="site-info" lang="en">
			<p>Copyright © <?php echo date("Y"); ?> Watanabe Store Co.,Ltd.</p>
			<p> All right reserved.</p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
