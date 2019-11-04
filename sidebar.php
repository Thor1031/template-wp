<?php
/**
 * Sidebar
 *
 * @package WordPress
 */

if ( is_active_sidebar( 'sidebar' ) ) : ?> <!-- サイドバーが有効かどうか -->

<!-- secondary -->
<aside id="secondary">
	<?php dynamic_sidebar( 'sidebar' ); ?> <!-- ダイナミックサイドバーを表示 -->
</aside><!-- secondary -->

<?php endif; ?>
