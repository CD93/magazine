var gulp = require('gulp');
var sass = require('gulp-sass');
var browserSync = require('browser-sync');
var uglify = require('gulp-uglify');
var del = require('del');
var runSequence = require('run-sequence');
var autoprefixer = require('gulp-autoprefixer');
var cleanCSS = require('gulp-clean-css');
var imagemin = require('gulp-imagemin');
var modernizr = require('gulp-modernizr');
var requirejsOptimize = require('gulp-requirejs-optimize');
var cache = require('gulp-cache');

gulp.task('watch',['browserSync'], function(){
  gulp.watch('spip/plugins/voeux2018/css/*.css',browserSync.reload);
  gulp.watch('spip/plugins/voeux2018/**/*.html', browserSync.reload);
  gulp.watch('spip/splugins/voeux2018/js/**/*.js', browserSync.reload);
  // autres observations
});

gulp.task('images', function(){
  return gulp.src('spip/plugins/voeux2018/images/**/*.+(png|jpg|gif|svg)')
  .pipe(imagemin())
  .pipe(gulp.dest('spip/plugins/voeux2018/images'))
});
gulp.task('browserSync', function() {
  browserSync({
    proxy: "http://magazine:80"
  })
});
gulp.task('autoprefixer',function() {
	return gulp.src('spip/plugins/voeux2018/css/*.css')
	.pipe(autoprefixer({
	            browsers: ['last 2 versions'],
	            cascade: false
	        }))
	.pipe(gulp.dest('spip/plugins/voeux2018/css'))
});
gulp.task('minify-css', function() {
  return gulp.src('spip/plugins/voeux2018/css/*.css')
    .pipe(cleanCSS({compatibility: 'ie8'}))
    .pipe(gulp.dest('spip/plugins/voeux2018/css'));
});

gulp.task('modernizr', function() {
  gulp.src('spip/plugins/voeux2018/js/**/*.js')
    .pipe(modernizr())
    .pipe(uglify())
    .pipe(gulp.dest("spip/plugins/voeux2018/js/build/"))
});


// les actions //

gulp.task('build', function (callback) {
  runSequence('autoprefixer',
  'minify-css','modernizr','images',
  callback
  )
});
gulp.task('default', function (callback) {
  runSequence(['browserSync', 'watch'],
  callback
  )
});
