//Imports

var path = require('path');
var gulp = require('gulp');
var browserSync = require('browser-sync').create();
var del = require('del');
var sourcemaps = require('gulp-sourcemaps');
var autoprefixer = require('gulp-autoprefixer');
var sass = require('gulp-sass')(require('sass'));
var cssnano = require('gulp-cssnano');
var concat = require('gulp-concat');
var cache = require('gulp-cached');
var uglify = require('gulp-uglify');
var gulpSquoosh = require('gulp-squoosh');

//Bootstrap 
var BOOTSTRAP = './node_modules/bootstrap/js/dist/';
var bootstrap_scripts = [

    // Don't need jquery because WordPress comes with it
   // './node_modules/jquery/dist/jquery.min.js',

    //BOOTSTRAP + 'util.js',
  //  BOOTSTRAP + 'carousel.js',
  //  BOOTSTRAP + 'collapse.js',
  //  BOOTSTRAP + 'dropdown.js',
 //   BOOTSTRAP + 'tab.js',
];

// LazyLoading
//var lazy_load_script = './node_modules/lazyload/lazyload.min.js';


// Slick Carousel
//var slick = './node_modules/slick-carousel/slick/slick.min.js';


// Definitions
var src = './src/';
var build = './dist/'; //Change directory if you like

var sources = {
  //  theme: `${src}theme-files/**/*`,
    images: [`${src}images/**/*`],
    styles: `${src}styles/**/*`,
    scripts: `${src}scripts/**/*`,
    slick_fonts: 'node_modules/slick-carousel/slick/fonts/**/*',
    slick_loader: 'node_modules/slick-carousel/slick/ajax-loader.gif',  
}

var destinations = {
    images: `${build}images/`,
    styles: `${build}styles/`,
    scripts: `${build}scripts/`,
    slick_fonts: `${build}/styles/fonts/`,
    slick_loader: `${build}/styles/`,
}

/**
 * Copy PHP files, base stylesheet and other WordPress items that don't need to be compiled / modified
 */
//function theme() {
//    return gulp.src(sources.theme)
//        .pipe(gulp.dest(build))
//}

/**
 * Optimises all source images
 */
function images() {
    return gulp.src(sources.images)
        .pipe(cache('images'))
        .pipe(gulpSquoosh())
        .pipe(gulp.dest(destinations.images))
};

/**
 * Compile sass files to css and write sourcemaps for development
 */
function styles() {
    return gulp.src(sources.styles)
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', function(err) {            
            console.error(err.message);
            browserSync.notify('<pre style="text-align: left">' + err.message + '</pre>', 10000); 
            this.emit('end'); 
        }))
        .pipe(autoprefixer())
        .pipe(cssnano())
        .pipe(gulp.dest(destinations.styles))    
        .pipe(browserSync.stream({match: '**/*.css'}))
}


// data file for the calculator
function data_files() {
    return gulp.src(sources.data_files)
        .pipe(gulp.dest(destinations.data_files))    
}

/*function vendor_scripts() {
    return gulp.src(
            [].concat.apply([], [
              bootstrap_scripts,
              //lazy_load_script,
              //slick,
            ])
        )
        .pipe(concat('vendor.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest(destinations.scripts))
}
*/

//Custom Scripts
function custom_scripts() {
    return gulp.src(sources.scripts)
        .pipe(concat('scripts.min.js'))
         .pipe(uglify())
        .pipe(gulp.dest(destinations.scripts))
}

/**
 * Removes all files in the /build folder for an initial clean
 */
function clean() {
    return del(build + '**/*', { force: true })
}

/**
 * Watch for changes in our source files and reload browser or inject changes where needed
 */
function watch() {
   browserSync.init({
        proxy: {
            target: "http://localhost/wordpress/"
        }
});

  gulp.watch(sources.images, images).on('change', browserSync.reload);
   // gulp.watch(sources.theme, theme).on('change', browserSync.reload);
    gulp.watch(sources.scripts, custom_scripts).on('change', browserSync.reload);
    //gulp.watch(sources.data_files, data_files).on('change', browserSync.reload);
    gulp.watch(sources.styles, styles);
}

exports.watch = gulp.series(
    clean,
    gulp.parallel(
       // theme,
        images,
        custom_scripts,
        //vendor_scripts,
        styles
    ),
    watch
)