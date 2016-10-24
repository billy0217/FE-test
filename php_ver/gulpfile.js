var gulp = require('gulp'),
	uglify = require('gulp-uglify'),
 	sass = require('gulp-sass'),
 	plumber = require('gulp-plumber'),
 	prefix = require('gulp-autoprefixer');


gulp.task('scripts',function(){
	// run specificity directory 
 	gulp.src('js/*.js')
	 	.pipe(plumber())
	 	.pipe(uglify())
	 	.pipe(gulp.dest('minjs'));
});

gulp.task('styles',function(){
	//gulp.src('sass/*.scss')
	gulp.src('scss/site.scss')
		.pipe(sass({
			//style: 'compressed'
			//style: 'expend'
			outputStyle : 'compressed'
		}))
		.pipe(plumber())
		.pipe(prefix('last 2 versions'))
		.pipe(gulp.dest('css/'));
		//.pipe(livereload());
});

gulp.task('watch',function(){
	// watch all js from any directory
	gulp.watch('js/*.js', ['scripts']);
	gulp.watch('scss/*.scss', ['styles']);
});

// mark default run 'scripts' and 'styles' tasks
gulp.task('default', ['scripts','styles', 'watch']);