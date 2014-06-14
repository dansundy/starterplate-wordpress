var gulp         = require('gulp'),
    
    autoprefixer = require('gulp-autoprefixer'),
    minifycss    = require('gulp-cssmin'),
    sass         = require('gulp-ruby-sass')
    


var src = {
  base: './src',
  styles: './src/sass'
}

var deploy = {
  base: './deploy'
}

/** 
 * Functions 
 */
var runStyles = function(opts) {
  return gulp.src(src.styles + '/style.sass')
    .pipe(sass({ style: opts.output, compass: true }))
    .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
    .pipe(gulp.dest(opts.location));
}

/**
 * Tasks
 */
gulp.task('styles', function() {
  runStyles({output: 'expanded', location: src.base});
  runStyles({output: 'compressed', location: deploy.base});
});