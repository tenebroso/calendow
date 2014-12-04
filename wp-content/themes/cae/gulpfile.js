// Include project requirements.
var gulp = require( 'gulp' ),
    jshint = require( 'gulp-jshint' ),
    uglify = require( 'gulp-uglify' ),
    sass = require( 'gulp-sass' ),
    concat = require('gulp-concat'),
    livereload = require('gulp-livereload'),
    watch = require('gulp-watch'),
    rename = require("gulp-rename"),
    prefix = require('gulp-autoprefixer'),
    minifyCSS = require('gulp-minify-css'),
    imagemin = require( 'gulp-imagemin' ),
    rev = require('gulp-rev');
    global.errorMessage = '';

// Sets assets folders.
var input = {
  scripts: ['assets/js/vendor/*.js'],
  js: ['assets/js/views/*/*', 'assets/js/_main.js'],
  sass: ['assets/scss/main.scss'],
  images: 'assets/img'
};

var output = {
  js: 'assets/js',
  css: 'assets/css',
  images: 'assets/img'
};


gulp.task( 'scripts', function () {

  gulp.src(input.scripts)
    .pipe(concat('scripts.js'))
    //.pipe(uglify())
    .pipe(gulp.dest(output.js));

  gulp.src(input.js)
    .pipe(jshint())
    .pipe(jshint.reporter('default'))
    .pipe(concat('site.js'))
    .pipe(gulp.dest(output.js))
    .pipe(livereload())
    .pipe(uglify())
    .pipe(rename('site.min.js'))
    .pipe(gulp.dest(output.js));
    
});

gulp.task( 'sass', function () {

  gulp.src(input.sass)
    .pipe(sass({outputStyle: 'expanded'}))
    .pipe(rename('main.css'))
    .pipe(prefix({
            browsers: ['last 5 versions'],
            cascade: false
        }))
    .pipe(gulp.dest(output.css))
    .pipe(livereload())
    .pipe(minifyCSS())
    .pipe(rename('main.min.css'))
    .pipe(gulp.dest( output.css ) )

});

gulp.task( 'optimize', function () {
  // Optimize all images.
  gulp.src( input.images + '/*.{png,jpg,gif}' )
    .pipe( imagemin({
      optimizationLevel: 7,
      progressive: true
    }) )
    .pipe( gulp.dest( output.images ) );
});

gulp.task('version', function() {
  return gulp.src(['assets/css/main.min.css', 'assets/js/scripts.min.js'], { base: 'assets' })
    .pipe(rev())
    .pipe(gulp.dest('assets'))
    .pipe(rev.manifest())
    .pipe(gulp.dest('assets'));
});

gulp.task('sprites', function () {
    return gulp.src('assets/img/*.svg')
        .pipe(svgSprite({mode: "symbols"}))
        .pipe(gulp.dest('assets/img'));
});


gulp.task('watch', function () {
  var client = ['scripts', 'sass'];
  gulp.watch( input.js, client);
  gulp.watch( [input.sass,'assets/scss/*/*.scss'], client);
  gulp.watch('*.php', client);
  gulp.watch('templates/*.php',client);
});

gulp.task('default', ['watch']);