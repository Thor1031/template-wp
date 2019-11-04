<?php
/**
 * Header
 *
 * @package WordPress
 */

?>

<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="format-detection" content="telephone=no">
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<title>タイトル</title>
		<meta name="description"
				content="ディスクリプション">
		<!-- <link rel="icon" href="./img/favicon.ico"> -->
		<?php wp_head(); ?>
  </head>

	<body <?php body_class(); ?>> <!-- body要素にクラスを付与する -->

		<header class="gheader">
			<div class="inner">

				<h1 class="header-logo">
					<!-- トップページのURLを取得し、それをエスケープ処理する -->
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/img/header-logo.png' ); ?>" alt="">
					</a>

					<!-- <a href="#">
						<img src="./img/header-logo.png" alt="ロゴ">
					</a> -->
					<!-- <span class="subttl txtxs">サブタイトル</span> -->
				</h1><!-- /header-logo -->

				<?php
				wp_nav_menu(
					array(
						'container'       => false, // ラップするcontainerなし
						'depth'           => 1, // 1階層まで表示
						'theme_location'  => 'global', // グローバルナビゲーションと指定
						'container'       => 'nav', // <nav>でラップする
						'container_class' => 'header-nav', // <nav>のクラス名指定
						'menu_class'      => 'header-list', // menuを構成する<ul>のクラス名
					)
				);
				?>
				<!-- <nav class="header-nav">
					<ul class="header-list">
						<li><a href="#">MENU1</a></li>
						<li><a href="#">MENU2</a></li>
						<li><a href="#">MENU3</a></li>
						<li><a href="#">MENU4</a></li>
						<li><a href="#">MENU5</a></li>
					</ul>
				</nav> -->
				<!-- /header-nav -->

				<button class="header-btn" type="button" aria-label="">
					<p class="txtxs">Lorem ipsum dolor</p>
				</button><!-- /header-btn -->

			</div><!-- /inner -->
		</header><!-- /header -->


		<div class="drawer">
			<button class="drawer-toggler" type="button" data-toggle="collapse" aria-controls="GDrawerCont"
			aria-label="Global navigation toggle button">
				<span></span>
			</button>
			<div class="drawer-close"></div>

			<!-- drawer-contents -->
			<div class="drawer-contents" id="GDrawerCont">
				<?php
				wp_nav_menu(
					array(
						'container'       => false,
						'depth'           => 1,
						'theme_location'  => 'drawer', // テーマ中で使われる位置を指定
						'container'       => 'nav', // <nav>でラップする
						'container_class' => 'drawer-nav', // <nav>のクラス名指定
						'menu_class'      => 'drawer-list', // menuを構成する<ul>のクラス名
					)
				);
				?>
				<!-- <nav class="drawer-nav">
					<ul class="drawer-list">
						<li><a href="#">MENU1</a></li>
						<li><a href="#">MENU2</a></li>
						<li><a href="#">MENU3</a></li>
						<li><a href="#">MENU4</a></li>
						<li><a href="#">MENU5</a></li>
					</ul>
				</nav> -->
				<!-- /drawer-nav -->

			</div><!-- /drawer-contents -->
		</div><!-- /drawer -->
