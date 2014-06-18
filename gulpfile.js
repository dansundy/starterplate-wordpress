var data         = require('./package.json');

var gulp         = require('gulp'),
    autoprefixer = require('gulp-autoprefixer'),
    clean        = require('gulp-clean'),
    concat       = require('gulp-concat'),
    jshint       = require('gulp-jshint'),
    livereload   = require('gulp-livereload'),
    rename       = require('gulp-rename'),
    replace      = require('gulp-replace'),
    sass         = require('gulp-ruby-sass'),
    uglify       = require('gulp-uglify'),
    watch        = require('gulp-watch');

var path = {
  src: {
    base: './src',
    styles: './src/sass',
    scripts: './src/js'
  },
  deploy: {
    base: './deploy',
    scripts: './deploy/js'
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
    .pipe(replace('{{textDomain}}', data.config.slug))
    .pipe(replace('{{themeName}}', function() {
      var string = data.config.title;
      if (env === 'src') {
        string += ' (Development)';
      }
      return string;
    }))
    .pipe(gulp.dest(path[env].base))
    .pipe(livereload({auto: false}));
}

var scripts = function(env) {
  var enqPath = '/inc/functions';

  if (env === 'deploy') {
    gulp.src(path.src.base + enqPath + '/enqueue-functions.php')
      .pipe(replace('/js/lib/main.dev.js', '/js/lib/main.min.js'))
      .pipe(gulp.dest(path.deploy.base + enqPath))
  }

  return gulp.src([
      path.src.scripts + '/*.js',
      '!' + path.src.scripts + '/*.dev.js',
      '!' + path.src.scripts + '/lib/*'
    ])
    .pipe(jshint())
    .pipe(jshint.reporter('default'))
    .pipe(concat('main.js'))
    .pipe(rename({suffix: '.dev'}))
    .pipe(gulp.dest(path.src.scripts))
    .pipe(uglify())
    .pipe(gulp.dest(path.deploy.scripts))
    .pipe(livereload({auto: false}));
}

var move = function() {
  return gulp.src([
    path.src.base + '/**/*.php',
    path.src.base + '/*.png',
    path.src.scripts + '/lib/*.js'
  ], {base: path.src.base})
    .pipe(gulp.dest(path.deploy.base))
}

/**
 * Tasks
 */
gulp.task('styles', function() {
  styles('src');
});

gulp.task('scripts', function() {
  scripts('src');
});

gulp.task('clean', function(){
  return gulp.src([path.deploy.base + '/*'], {read: false})
    .pipe(clean())
});

gulp.task('build', ['clean'], function(){
  styles('deploy');
  scripts('deploy');
  move();
});

gulp.task('watch', function(){
  livereload.listen();
  gulp.watch(path.src.styles + '/**/*.sass', ['styles']);
  gulp.watch(path.src.scripts + '/*.js', ['scripts']);
});