
var gulp = require('gulp');
// var bower = require('main-bower-files');
// var filter = require('gulp-filter');
var shell = require('gulp-shell');
var sass = require('gulp-ruby-sass');
var pleeease = require('gulp-pleeease');
var sourcemaps = require('gulp-sourcemaps');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var imagemin = require('gulp-imagemin');
var php = require('gulp-connect-php');
var browserSync = require('browser-sync');
var reload      = browserSync.reload;


// ソースコードの Directory を指定(最後に / 必要)
var srcDir = 'src/';
var destDir = 'build/';


// build
gulp.task('build',['root','lib','sass','js','jsex','img']);

// gulp.task('shell', shell.task([
// 		'cp -r ./src/root ./build',
// ]))

// root
gulp.task('root', function () {
	gulp.src( srcDir + 'root/**/*.*' )
		.pipe(gulp.dest(destDir))
		.pipe(reload({stream:true}));
});

// lib
gulp.task('lib', function () {
	gulp.src( srcDir + 'lib/**/*.*')
		.pipe(gulp.dest(destDir + 'lib'))
		.pipe(reload({stream:true}));
});

// Sass

gulp.task('sass', function () {
	sass(srcDir + 'sass/',{
		style: 'expanded'
		, sourcemap: true
	})
	.pipe(pleeease({
		autoprefixer: {"browsers": ["last 4 versions", "Android 2.3"]}
		, minifier: false
	}))
	.pipe(sourcemaps.write('./'))
	.pipe(gulp.dest(destDir + 'css'))
	.pipe(reload({stream:true}));
});

// Js-concat-uglify

gulp.task('js', function() {
	gulp.src([srcDir + 'js/**/*.js'])
	.pipe(concat('scripts.js'))
	.pipe(uglify({preserveComments: 'some'})) // Keep some comments
	.pipe(gulp.dest(destDir + 'js'))
	.pipe(reload({stream:true}));
});

// JSex

gulp.task('jsex', function() {
	gulp.src([srcDir + 'root/js/**/*.*'])
	.pipe(gulp.dest(destDir + 'js'))
	.pipe(reload({stream:true}));
});

//gulp.task('bower', function() {
//	var jsFilter = filter([srcDir + '**/*.js']);
//		gulp.src(bower())
//		.pipe(jsFilter)
//		.pipe(concat('scripts.js'))
//		.pipe(uglify({presserveComents: 'some'}))
//		.pipe(gulp.dest(destDir + 'js'))
//		.pipe(reload({stream:true}));
//});


// Imagemin

gulp.task('img', function() {
    gulp.src([srcDir + 'img/**/*.{png,jpg,gif,svg}'])
        .pipe(imagemin({optimizationLevel: 7}))
        .pipe(gulp.dest(destDir + 'img'));
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
	gulp.watch(srcDir + 'root/*.*',['root']);
	gulp.watch(srcDir + 'lib/**/*.*',['lib']);
	gulp.watch(srcDir + 'sass/**/*.scss',['sass']);
	gulp.watch(srcDir + 'js/**/*.js',['js']);
	gulp.watch(srcDir + 'img/**/*.{png,jpg,gif,svg}',['imagemin']);
	gulp.watch(srcDir + "*.html", ['bs-reload']);
	gulp.watch(srcDir + "*.php", ['bs-reload']);
});
