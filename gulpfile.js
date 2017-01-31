// Sass configuration
var gulp = require('gulp');
var sass = require('gulp-sass');

gulp.task('sass', function() {
    gulp.src('./assets/scss/style.scss')
        .pipe(sass().on('error', sass.logError))
        //.pipe(gulp.dest(function(f) {
        //    return f.base;
        //}))
        .pipe(gulp.dest('./assets/css'))
});

gulp.task('default', ['sass'], function() {
    gulp.watch('./assets/scss/**/*.scss', ['sass']);
})