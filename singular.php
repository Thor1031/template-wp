<?php
/**
 * Singular
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

<?php
if ( have_posts() ) : // $wp_queryに投稿データがあるなら
	while ( have_posts() ) : // $wp_queryに投稿データが存在する間は処理を続ける
		the_post(); // $wp_queryから順に投稿データを取り出す
		?>

<!-- entry -->
<article <?php post_class( array( 'entry' ) ); ?>>

	<!-- entry-header -->
	<div class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1><!-- /entry-title -->

		<!-- entry-meta -->
		<div class="entry-meta">
			<time class="entry-published" datetime="<?php the_time( 'c' ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time>
			<div class="entry-tag"><?php my_the_post_category(); ?></div><!-- /entry-item-tag -->
		</div><!-- /entry-meta -->

		<!-- entry-img -->
		<div class="entry-img">
		<!-- /サムネイルがあれば適用、なければデフォルトの画像を使う -->
		<?php
		if ( has_post_thumbnail() ) {
			the_post_thumbnail( 'my_thumbnail' );
		} else {
			echo '<img src="' . esc_url( get_template_directory_uri() ) . '/img/noimg.png" alt="">';
		}
		?>
		</div><!-- /entry-img -->
	</div><!-- /entry-header -->

	<!-- entry-body -->
	<div class="entry-body">
		<?php the_content(); ?> <!-- /投稿の内容を表示 -->
		<!-- /「次のページ」のリンクを指定-->
		<?php
		wp_link_pages(
			array(
				'before'         => '<nav class="entry-links">',
				'after'          => '</nav>',
				'link_before'    => '',
				'link_after'     => '',
				'next_or_number' => 'number',
				'separator'      => '',
			)
		);
		?>
	</div><!-- /entry-body -->

</article><!-- /entry -->

<!-- entry-pager -->
<div class="entry-pager">
		<!-- /「次の記事へ」のリンク -->
		<?php next_post_link( '<div class="entry-next"><div class="entry-pager-title">次の記事</div>%link</div>', '%title', false ); ?>
		<!-- /「前の記事へ」のリンク -->
		<?php previous_post_link( '<div class="entry-prev"><div class="entry-pager-title">前の記事</div>%link</div>', '%title', false ); ?>
</div><!-- /entry-pager -->

		<?php
endwhile;
endif;
?> <!-- /投稿情報を表示するためのループ終了 -->

</main><!-- /primary -->


<?php get_sidebar(); ?>


</div><!-- /inner -->
</div><!-- /content -->


<?php get_footer(); ?>
