var data         = require('./package.json');

var gulp         = require('gulp'),
    autoprefixer = require('gulp-autoprefixer'),
    replace      = require('gulp-replace'),
    sass         = require('gulp-ruby-sass')
    


var path = {
  src: {
    base: './src',
    styles: './src/sass'
  },
  deploy: {
    base: './deploy'
  }
}

/** 
 * Functions 
 */
var styles = function(env) {
  var source = path.src.styles + '/*.sass';
  var output = env === 'src' ? 'expanded' : 'compressed';
  return gulp.src(source)
    .pipe(sass({ style: output, compass: true }))
    .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
    .pipe(replace('{{themeURI}}', data.homepage))
    .pipe(replace('{{author}}', data.author.name))
    .pipe(replace('{{authorURI}}', data.author.url))
    .pipe(replace('{{description}}', data.description))
    .pipe(replace('{{version}}', data.version))
    .pipe(replace('{{textDomain}}', data.name))
    .pipe(replace('{{themeName}}', function() {
      var string = data.config.title;
      if (env === 'src') {
        string += ' (Development)';
      }
      return string;
    }))
    .pipe(gulp.dest(path[env].base));
}

/**
 * Tasks
 */
gulp.task('styles', function() {
  styles('src');
  styles('deploy');
});