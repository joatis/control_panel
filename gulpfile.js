var gulp = require('gulp');
var watch = require('gulp-watch');

var source = './src',
    destination = '/var/www/control_panel/dist/src';

gulp.task('default', function(){
 
});

gulp.task('watch-folder', function() {
	gulp.src(source + '/**/*', {base: source})
	  .pipe(watch(source, {base: source}))
	  .pipe(gulp.dest(destination));
});

