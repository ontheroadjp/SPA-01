var gulp = require('gulp');
var bower = require('main-bower-files');
var sass = require('gulp-sass');
var less = require('gulp-less');
var pleeease = require('gulp-pleeease');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var filter = require('gulp-filter');
var imagemin = require('gulp-imagemin');
var php = require('gulp-connect-php');
var browserSync = require('browser-sync');
var reload      = browserSync.reload;


// ソースコードの Directory を指定(最後に/必要)
var target = 'src/';

// build
gulp.task('build',['ext','less','sass','js','img']);

// ext
gulp.task('ext', function () {
	gulp.src(target + 'ext/**/*.*')
		.pipe(gulp.dest('build'))
		.pipe(reload({stream:true}));
});

// less
gulp.task('less', function () {
	gulp.src(target + 'less/**/*.less')
				.pipe(less({errLogToConsole: true}))
				.pipe(pleeease({
					autoprefixer: {
						browsers: ['last 2 versions']
					}
				}))
				.pipe(gulp.dest('build/css'))
				.pipe(reload({stream:true}));
});

// Sass

gulp.task('sass', function () {
    gulp.src(target + 'sass/**/*.scss')
        .pipe(sass({errLogToConsole: true})) // Keep running gulp even though occurred compile error
        .pipe(pleeease({
            autoprefixer: {
                browsers: ['last 2 versions']
            }
        }))
        .pipe(gulp.dest('build/css'))
        .pipe(reload({stream:true}));
});

// Js-concat-uglify

gulp.task('js', function() {
    gulp.src([target + 'js/*.js'])
        .pipe(concat('scripts.js'))
        .pipe(uglify({preserveComments: 'some'})) // Keep some comments
        .pipe(gulp.dest('build/js'))
        .pipe(reload({stream:true}));
});

gulp.task('bower', function() {
	var jsFilter = filter([target + '**/*.js']);
		gulp.src(bower())
		.pipe(jsFilter)
		.pipe(concat('scripts.js'))
		.pipe(uglify({presserveComents: 'some'}))
		.pipe(gulp.dest('build/js'))
		.pipe(reload({stream:true}));
});


// Imagemin

gulp.task('img', function() {
    gulp.src([target + 'img/**/*.{png,jpg,gif,svg}'])
        .pipe(imagemin({optimizationLevel: 7}))
        .pipe(gulp.dest('build/img'));
});

// Static server

gulp.task('php', function() {
	php.server({ base: './build/', port: 8080, keepalive: true});
});

gulp.task('browser-sync',['php'], function() {
    browserSync({
        //server: {
            // baseDir: "./"
            baseDir: "./build/",
						proxy: "127.0.0.1:8080",
						port: 9999,
						open: true,
						notify: false,
        //}
    });
});

//gulp.task('browser-sync', function() {
//    browserSync({
//        server: {
//            // baseDir: "./"
//            baseDir: "./build/",
//        }
//    });
//});

// Reload all browsers

gulp.task('bs-reload', function () {
    browserSync.reload();
});

// Task for `gulp` command

gulp.task('default',['browser-sync'], function() {
    gulp.watch(target + 'sass/**/*.scss',['sass']);
    gulp.watch(target + 'less/**/*.less',['less']);
    gulp.watch(target + 'ext/**/*.*',['ext']);
    gulp.watch(target + 'js/*.js',['js']);
    gulp.watch(target + 'img/**/*.{png,jpg,gif,svg}',['imagemin']);
    gulp.watch(target + "*.html", ['bs-reload']);
    gulp.watch(target + "*.php", ['bs-reload']);
});
