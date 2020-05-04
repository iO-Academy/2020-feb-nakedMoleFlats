// Require in needed packages
var gulp = require('gulp');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');

// Sass compiler
function compileSass(cb) {
   return gulp.src('src/scss/styles.scss')
       .pipe(sourcemaps.init())
       .pipe(sass())
       .pipe(sourcemaps.write())
       .pipe(gulp.dest('dist/css'));
   cb();
}
// File watcher
function watch(cb) {
   gulp.watch("src/scss/**/*.scss", compileSass);
   cb();
}
exports.sass = compileSass;
exports.watch = watch;
