
var gulp = require('gulp');
var bower = require('main-bower-files');
var sass = require('gulp-ruby-sass');
var pleeease = require('gulp-pleeease');
var sourcemaps = require('gulp-sourcemaps');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var filter = require('gulp-filter');
var imagemin = require('gulp-imagemin');
var php = require('gulp-connect-php');
var browserSync = require('browser-sync');
var reload      = browserSync.reload;

var shell = require('gulp-shell');


// ソースコードの Directory を指定(最後に / 必要)
var target = 'src/';

// build
gulp.task('build',['app','lib','sass','js','img']);

gulp.task('shell', shell.task([
			  'cp -r ./src/app ./build',
					]))

// app
gulp.task('app', function () {
	gulp.src(
							target + 'app/**/*.*'
						)
		.pipe(gulp.dest('build/'))
		.pipe(reload({stream:true}));
});

// lib
gulp.task('lib', function () {
	gulp.src(
							target + 'Spa01/**/*.*'
						)
		.pipe(gulp.dest('build/Spa01'))
		.pipe(reload({stream:true}));
});

// Sass

var sassoptions = {
	style: 'expanded'
	, sourcemap: true
};

gulp.task('sass', function () {
	sass(target + 'sass/',{
		style: 'expanded'
		, sourcemap: true
	})
	.pipe(pleeease({
		autoprefixer: {"browsers": ["last 4 versions", "Android 2.3"]}
		, minifier: false
	}))
	.pipe(sourcemaps.write('./'))
	.pipe(gulp.dest('build/css'))
	.pipe(reload({stream:true}));
});

// Js-concat-uglify

gulp.task('js', function() {
	gulp.src([target + 'js/**/*.js'])
	.pipe(concat('scripts.js'))
	.pipe(uglify({preserveComments: 'some'})) // Keep some comments
	.pipe(gulp.dest('build/js'))
	.pipe(reload({stream:true}));
});

//gulp.task('bower', function() {
//	var jsFilter = filter([target + '**/*.js']);
//		gulp.src(bower())
//		.pipe(jsFilter)
//		.pipe(concat('scripts.js'))
//		.pipe(uglify({presserveComents: 'some'}))
//		.pipe(gulp.dest('build/js'))
//		.pipe(reload({stream:true}));
//});


// Imagemin

gulp.task('img', function() {
    gulp.src([target + 'img/**/*.{png,jpg,gif,svg}'])
        .pipe(imagemin({optimizationLevel: 7}))
        .pipe(gulp.dest('build/img'));
});

// Static server

gulp.task('php', function() {
	php.server({ base: './build/', port: 9998, keepalive: true});
});

gulp.task('browser-sync',['php'], function() {
    browserSync({
        //server: {
            baseDir: "./build/",
	proxy: "127.0.0.1:9998",
	port: 9999,
	open: true,
	notify: false,
        //}
    });
});

// Reload all browsers

gulp.task('bs-reload', function () {
browserSync.reload();
});

// Task for `gulp` command

gulp.task('default',['browser-sync'], function() {
	gulp.watch(target + 'app/*.*',['app']);
	gulp.watch(target + 'Spa01/**/*.*',['lib']);
	gulp.watch(target + 'sass/**/*.scss',['sass']);
	gulp.watch(target + 'js/**/*.js',['js']);
	gulp.watch(target + 'img/**/*.{png,jpg,gif,svg}',['imagemin']);
	gulp.watch(target + "*.html", ['bs-reload']);
	gulp.watch(target + "*.php", ['bs-reload']);
});
