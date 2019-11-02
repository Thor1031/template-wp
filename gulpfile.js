var { src, dest, task, watch, series } = require("gulp");
var sass = require("gulp-sass");
var plumber = require("gulp-plumber");
var notify = require("gulp-notify");
var sassGlob = require("gulp-sass-glob");
var mmq = require("gulp-merge-media-queries");
var browserSync = require("browser-sync");
var reload = browserSync.reload;

var imagemin = require("gulp-imagemin");
var imageminPngquant = require("imagemin-pngquant");
var imageminMozjpeg = require("imagemin-mozjpeg");

var postcss = require("gulp-postcss");
var autoprefixer = require("autoprefixer");
var cssdeclsort = require("css-declaration-sorter");

// var ejs = require( 'gulp-ejs' );
// var rename = require( 'gulp-rename' );
// var replace = require('gulp-replace');
// var header = require('gulp-header');
// var fs = require('fs');
// var merge = require('merge-stream');

// 画像圧縮のオプション設定
var imageminOption = [
	imageminPngquant({ quality: "65-80" }),
	imageminMozjpeg({ quality: 85 }),

	imagemin.gifsicle({
		// gif　圧縮
		interlaced: false,
		optimizationLevel: 1,
		colors: 256
	}),
	imagemin.jpegtran(), // jpeg　圧縮
	imagemin.optipng(), // png　圧縮
	imagemin.svgo() // svg　圧縮
];

// 画像圧縮処理
task("imagemin", function() {
	return src("./img/**/*")
		.pipe(plumber({ errorHandler: notify.onError("Error: <%= error.message %>") })) // gulp中断を防ぐ
		.pipe(imagemin(imageminOption))
		.pipe(dest("./img"));
});

// sassのコンパイル
task("sass", function() {
	return src("./sass/**/*.scss")
		.pipe(plumber({ errorHandler: notify.onError("Error: <%= error.message %>") })) // gulp中断を防ぐ
		.pipe(sassGlob()) // import時にsetting/** のような記述ができる
		.pipe(sass({ outputStyle: "expanded" })) // css変換処理と、出力フォーマット形式の指定
		.pipe(postcss([autoprefixer()])) // ベンダープレフィックスを追加
		.pipe(postcss([cssdeclsort({ order: "alphabetically" })])) // プロパティをアルファベット順でソート
		.pipe(mmq()) // バラバラに記載されているメディアクエリを1つにまとめてくれる
		.pipe(dest("./css")); // cssフォルダに出力
});

// ファイルの監視
task("watch", function(done) {
	browserSync.init({
		files: ["./**/*.php"],
		proxy: "http://sample01.wp/",
		open: true, // Gulp起動時にproxyで設定したURLのサイトを自動的に開くことを許可
		reloadDelay: 2000　// リロードに2秒Delay
	});
	watch("./sass/**/*.scss", series("sass"));
	watch("./js/*.js", task("bs-reload"));
	watch("./css/*.css", task("bs-reload"));
	// watch('./img/**/*', series("imagemin", "bs-reload"));
	done();
});

// task("browser-sync", function() {
// 	browserSync.init({
// 		proxy: "http://sample.local/"
// 	});
// });

// ブラウザのリロード
task("bs-reload", function(done) {
	browserSync.reload();
	done();
});

// デフォルトタスク
task("default", series("watch"), function(done) {
	done();
});
