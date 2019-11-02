<?php
/**
 * 404
 *
 * @package WordPress
 */

get_header(); ?>


<!-- mv -->
<div id="mv">
<div class="inner">
</div><!-- /inner -->
</div><!-- /mv -->


<!-- content -->
<div id="content">
<div class="inner">

<!-- primary -->
<main id="primary">

<!-- entry -->
<article <?php post_class( array( 'entry' ) ); ?>> <!-- /post_classで記事によって異なるクラスを与えることができ、スタイリングもそれぞれ変化をつけられる -->

	<p>コンテンツが存在しません。</p>

</article><!-- /entry -->

</main><!-- /primary -->


<?php get_sidebar(); ?>


</div><!-- /inner -->
</div><!-- /content -->


<?php get_footer(); ?>
