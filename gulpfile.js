var { src, dest, task, watch, series } = require( 'gulp' );
var sass = require( 'gulp-sass' );
var plumber = require( 'gulp-plumber' );
var notify = require( 'gulp-notify' );
var sassGlob = require( 'gulp-sass-glob' );
var mmq = require( 'gulp-merge-media-queries' );
var browserSync = require( 'browser-sync' );

var imagemin = require( 'gulp-imagemin' );
var imageminPngquant = require( 'imagemin-pngquant' );
var imageminMozjpeg = require( 'imagemin-mozjpeg' );

var postcss = require( 'gulp-postcss' );
var autoprefixer = require( 'autoprefixer' );
var cssdeclsort = require( 'css-declaration-sorter' );

var ejs = require( 'gulp-ejs' );
var rename = require( 'gulp-rename' );
var replace = require('gulp-replace');
var header = require('gulp-header');
var fs = require('fs');
var concat = require("gulp-concat");
// var merge = require('merge-stream');

// task
var tk_phpfile = "create-phpfiles";
var tk_newfile = "new-file";
var tk_themename = "themename";
var tk_server = 'build-server';
var tk_reload = 'browser-reload';
var tk_watch = 'watch-files';

// 各種settings
var liveview = false; // serverを立ち上げるか否か

var banner = [
  '/*',
  ' Theme Name: sample1',
  '*/',
  ''
].join('\n\n');

var imageminOption = [
  imageminPngquant({ quality: '65-80' }),
  imageminMozjpeg({ quality: 85 }),

  imagemin.gifsicle({ // gif　圧縮
    interlaced: false,
    optimizationLevel: 1,
    colors: 256
  }),
  imagemin.jpegtran(), // jpeg　圧縮
  imagemin.optipng(), // png　圧縮
  imagemin.svgo() // svg　圧縮
];

// sassコンパイルタスク
task( 'sass', function() {
  return src('./sass/**/*.scss') // watchをエラーで中断させないようにする
    .pipe(plumber({ errorHandler: notify.onError('Error: <%= error.message %>') })) // import時に setting/** のような記述ができる
    .pipe(sassGlob()) // css変換処理と、出力フォーマット形式の指定
    .pipe(sass({ outputStyle: 'expanded' })) // ベンダープレフィックスを自動で付与してくれる
    .pipe(postcss([autoprefixer()])) // プロパティをソートし直してくれる, ここではアルファベット順
    .pipe(postcss([cssdeclsort({ order: 'alphabetically' })])) // バラバラに記載されているメディアクエリを1つにまとめてくれる
    .pipe(mmq())
    .pipe(dest('./css'));
});

task('watch', function () {
	watch('./sass/**/*.scss', series('sass', 'bs-reload'));
});

task('browser-sync', function () {
	browserSync.init({
		proxy: 'template.local'
	});
});

task('bs-reload', function () {
	browserSync.reload();
});

task('default', series("browser-sync", 'watch'), function () {
	watch('./*.php', task('bs-reload'));
	watch('./css/*.css', task('bs-reload'));
	watch('./js/*.js', task('bs-reload'));
});

// imagemin 画像圧縮処理
task('imagemin', function () {
	return src('./img/**/*') // タスクの対象となるファイル
		.pipe(imagemin(imageminOption))
		.pipe(dest('./img')); // 出力先
});

// サーバーの立ち上げ
// task(tk_server, function (done) {
//   if (liveview == true) {
//     browserSync.init({
//       // server: {
//       //   baseDir: "./",
//       //   index: 'index.html'
// 			// }
// 			proxy: "template.local"
//     });
//   }
// 	done();
// });

//　監視ファイルを指定
// task(tk_watch, function (done) {
//   watch('./sass/**/*.scss', task('sass'));
//   // watch("./*.html", task(tk_reload));
//   watch("./css/*.css", task(tk_reload));
//   watch("./js/*.js", task(tk_reload));
//   done();
// });

// ブラウザのリロード
// task(tk_reload, function (done) {
//   if (liveview == true) {
//     browserSync.reload();
//   }
// 	done();
// });

// phpファイル群作成
// task(tk_phpfile, function (done) {
//   fs.stat("./index.php", function (err, stat) {
//     // index.phpがすでに存在するとき
//     if (err == null) {
//       return false; // これによってこれ以降のdefaultタスクは実行されない
//     }
//     // index.phpがまだ存在しないとき
//     if (err.code == "ENOENT") {
//       var data = ["home", "header"];

//       src("./index.html")
//         .pipe(rename(function (path) { path.extname = ".php"; }))
//         .pipe(replace("./css/style.css", "<?php  echo get_template_directory_uri(); ?>/css/style.css"))
//         .pipe(replace('<img src=".', '<img src="<?php echo get_template_directory_uri(); ?>'))
//         .pipe(dest("./"))
//         .pipe(rename("home.php")).pipe(dest("./"))
//         .pipe(rename("header.php")).pipe(dest("./"))
//         .pipe(rename("footer.php")).pipe(dest("./"));
//       done();
//     }
//   });
// });

// wordpressテーマ名の付与
// task(tk_themename, function (done) {
//   src("./css/style.css")
//     .pipe(header(banner))
//     .pipe(dest("./css/"));
//   done();
// });

// タスクの実行
// task('default',
//   series(
//     tk_server,
//     tk_watch,
//     tk_phpfile,
//     tk_themename,
//     function (done) {
//   done();
// }));
