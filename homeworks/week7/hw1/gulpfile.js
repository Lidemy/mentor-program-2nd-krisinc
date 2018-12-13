var gulp = require('gulp')
var sass = require('gulp-sass')

gulp.task('css', function() {
    return gulp.src('./temp/app.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('./../hw1'))
})

gulp.task('default',['css'])