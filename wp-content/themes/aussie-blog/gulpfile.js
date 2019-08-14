var domain = 'http://aussie-casino.local'; //local url

//NPM-MODULES
//--------------------------------------------------
var gulp = require('gulp');
var plumber = require('gulp-plumber');
var rename = require("gulp-rename");
var browserSync = require('browser-sync');
var imagemin = require('gulp-imagemin');
var less = require('gulp-less');
var autoprefixer = require('gulp-autoprefixer');
var cleanCSS = require('gulp-clean-css');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var util = require('gulp-util');
var livereload = require('gulp-livereload');
var sourcemaps = require('gulp-sourcemaps');

//TASK: gulp
//--------------------------------------------------
/*gulp.task('default', ['less', 'js'], function () {
	gulp.start('watch');
});*/
gulp.task('default', ['browser-sync', 'watch']);

//TASK: gulp watch
//--------------------------------------------------
gulp.task('watch', function () {
    livereload.listen();
    gulp.watch('**/*.php', livereload.reload);
    gulp.watch(['./less/**/*.less'], ['less']);
    gulp.watch(['./js/**/*.js', '!./js/scripts.min.js'], ['js']);
});

//TASK: gulp img
//--------------------------------------------------
gulp.task('img', function () {
    gulp.src(['./{img,css}/**/*.{png,jpg,jpeg,gif}', './screenshot.png'])
        .pipe(plumber())
        .pipe(imagemin({progressive: true}))
        .pipe(gulp.dest("./"));
});

//TASK: gulp less
//--------------------------------------------------
gulp.task('less', function () {
    gulp.src(['./less/style.less'])
        .pipe(sourcemaps.init({loadMaps: true}))
        .pipe(plumber())
        .pipe(less())
        .pipe(cleanCSS())
        .pipe(rename({extname: ".min.css"}))
        .pipe(autoprefixer({browsers: ['last 50 versions']}))
        .pipe(cleanCSS({compatibility: 'ie8', keepSpecialComments: 1}))
        .pipe(sourcemaps.write('./maps'))
        .pipe(gulp.dest('./css'))
});


//TASK: gulp js
//--------------------------------------------------
gulp.task('js', function () {
    return gulp.src(['./js/custom.js'])
        .pipe(plumber())
        .pipe(concat('./scripts.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest("./js"));
});

gulp.task('browser-sync', function () {
//watch files
    var files = [
        './js/*.js',
        '**/*.php',
        './less/**/*.less'
    ];

//initialize browsersync
    browserSync.init(files, {
        proxy: domain,
        injectChanges: true, //inject CSS changes
        notify: false
    });
});
