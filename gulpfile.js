var gulp = require('gulp')
var livereload = require('gulp-livereload')

gulp.task('html', function () {
  gulp.src('*.html')
        .pipe(livereload())
})
gulp.task('background', function () {
  gulp.src('background/*.html')
        .pipe(livereload())
})

gulp.task('watch', function () {
  livereload.listen()
  gulp.watch('*.html', ['html'])
  gulp.watch('background/*.html', ['background'])
})
