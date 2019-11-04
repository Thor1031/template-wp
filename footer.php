<?php
/**
 * Footer
 *
 * @package WordPress
 */

?>

<footer class="gfooter">
	<aside class="gfooter-contents">
		<?php
		// wp_nav_menu(
		// array(
		// 'container'       => false,
		// 'depth'           => 1,
		// 'theme_location'  => 'utility',
		// 'container'       => 'nav',
		// 'container_class' => 'footer-nav',
		// 'menu_class'      => 'footer-list',
		// )
		// );
		?>
		<div class="f-menu inner">
			<dl class="f-menu01">
				<dt>
				</dt>
				<div class="f-grid-bx">
					<dd></dd>
					<dd></dd>
					<dd></dd>
				</div>
			</dl>
		</div>
	</aside><!-- /gfooter-contents -->

	<div class="gfooter-bottom">
		<div class="inner">
			<!-- <div><img src="./img/f-logo.png" alt=""></div> -->
			<p class="copy"><small>&copy;</small></p>
			<div class="copy">
				Copyright &copy; <?php echo esc_html( date( 'Y' ) ); ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<?php bloginfo( 'name' ); ?> <!-- サイトのタイトルを表示 -->
				</a>
				All Rights Reserved.
			</div>
			<!-- /copy -->

		</div><!-- /inner -->
	</div><!-- /gfooter-bottom -->
</footer><!-- /footer -->

<script type="text/javascript">
	$(function() {
		$(".mv-slider").slick({
			dots: true,
			infinite: true,
			speed: 300,
			slidesToShow: 1,
			adaptiveHeight: true,
			autoplay: true,
			autoplaySpeed: 3000,
			arrows: false,
		});
	});
</script>

<?php wp_footer(); ?>
</body>
</html>
