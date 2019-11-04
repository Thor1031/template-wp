<?php
/**
 * Index
 *
 * @package WordPress
 */

get_header(); ?>

<!-- mv -->
<div class="mv">
	<div class="inner">
		<p class="catchcopy txtl">キャッチコピー</p>

		<div class="main-slider">
			<a href="#">
				<img class="slider-img pc" src="./img/slider-item01" alt="slide01">
				<img class="slider-img sp" src="./img/slider-item01-sp" alt="slide01-sp">
			</a>
			<a href="#">
				<img class="slider-img pc" src="./img/slider-item02" alt="slide02">
				<img class="slider-img sp" src="./img/slider-item02-sp" alt="slide02-sp">
			</a>
		</div><!-- /main-slider-->

	</div><!-- /inner -->
</div><!-- /mv -->

<ul class="panel-group inner">  <!-- 実際に使う際はinnerを消して-->
	<li class="panel"><p><a class="panel-heading" data-toggle="collapse" data-target="panel01">MENU1</a></p>
		<ul id="panel01" class="panel-collapse">
			<li><a href="#panel01">Child1</a></li>
			<li><a href="#panel01">Child2</a></li>
			<li><a href="#panel01">Child3</a></li>
		</ul>
	</li> <!-- /panel -->
	<li class="panel"><p><a class="panel-heading" data-toggle="collapse" data-target="panel02">MENU2</a></p>
		<ul id="panel02" class="panel-collapse">
			<li><a href="#panel02">Child1</a></li>
			<li><a href="#panel02">Child2</a></li>
			<li><a href="#panel02">Child3</a></li>
		</ul>
	</li> <!-- /panel -->
</ul>

<div class="float">
	<a href="#"></a>

	<button class="toTop" type="button" aria-label="Back to top">
		<i class="fas fa-chevron-up arrow"></i>
	</button>
</div><!-- /float -->

<form action="/" method="post" class="inner"> <!-- 実際に使う際はinnerを消して-->
	<div class="form-outer"><input type="text" name="user_last_name" value="" placeholder="姓"></div>
	<div class="form-outer"><input type="text" name="user_first_name" value="" placeholder="名"></div>
	<div class="form-outer"><input type="email" name="user_email" value="" placeholder="メールアドレス"></div>
	<div class="form-outer"><textarea name="user_message" cols="90" rows="12" placeholder="質問などはこちら（空欄でもOK）"></textarea></div>
	<div class="form-outer"><button type="submit" class="submit-btn">送信</button></div>
</form><!-- /form -->


<div id="contents">
  <div class="inner">

    <main>
			<section class="leading">
				<div class="inner">
					<h2 class="ttll"></h2>
					<p class="txt"></p>
				</div>
			</section>
			<section class="aboutcompany">
				<div class="inner">
					<h2 class="ttll"></h2>
					<p class="txt"></p>
				</div>
			</section>
			<section class="">
				<div class="inner">
					<h2 class="ttll"></h2>
					<p class="txt"></p>
				</div>
			</section>
    </main><!-- primary -->

		<?php get_sidebar(); ?>

  </div><!-- /inner -->
</div><!-- /contents -->


<?php get_footer(); ?>
