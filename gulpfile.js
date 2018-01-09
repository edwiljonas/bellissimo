// Variables
var gulp = require('gulp'),
    gutil = require('gulp-util'),
    sass = require('gulp-sass'),
    connect = require('gulp-connect'),
    uglify = require('gulp-uglify'),
    concat = require('gulp-concat'),
    imagemin = require('gulp-imagemin');

// Source
var _js = [
        'knack/assets/scripts/main.js',
        'knack/assets/scripts/owl.js',
        'knack/assets/scripts/comp.js',
        'knack/assets/scripts/global.js'
    ],
    _sass = [
        'knack/assets/styles/main.scss',
        'knack/assets/styles/vc.scss',
        'knack/assets/styles/admin.scss',
        'knack/assets/styles/metabox.scss',
        'knack/assets/styles/font-awesome/scss/font-awesome.scss'
    ],
    _output = 'assets';

// Sass
gulp.task('sass', function() {
    gulp.src(_sass)
        .pipe(sass({style: 'expanded'}))
        .on('error', gutil.log)
        .pipe(gulp.dest(_output+'/css'))
        .pipe(connect.reload())
});

// Script
gulp.task('scripts', function() {
    gulp.src(_js)
        .pipe(uglify())
        .pipe(gulp.dest(_output+'/js'))
        .pipe(connect.reload())
});

// Images
gulp.task('images', function() {
    return gulp.src('knack/assets/images/*.{jpg,png}')
        .pipe(gulp.dest(_output+'/images'));
});


// Watch
gulp.task('watch', function() {
    gulp.watch('scripts/*.js', ['scripts']);
    gulp.watch('knack/assets/styles/main.scss', ['sass']);
});