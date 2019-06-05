// Requires Gulp v4.
// $ npm uninstall --global gulp gulp-cli
// $ rm /usr/local/share/man/man1/gulp.1
// $ npm install --global gulp-cli
// $ npm install
const {src, dest, watch, series, parallel} = require('gulp');
const browsersync = require('browser-sync').create();
const sass = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');
const sourcemaps = require('gulp-sourcemaps');
const plumber = require('gulp-plumber');
const sasslint = require('gulp-sass-lint');
const cache = require('gulp-cached');
// npm install -save browsersync gulp-sass gulp-autoprefixer gulp-sourcemaps gulp-plumber gulp-sass-lint gulp-cached

// Compile CSS from Sass.
function buildStyles() {
    return src('assets/scss/*.scss', 'assets/scss/**/*.scss')
        .pipe(plumber()) // Global error listener.
        .pipe(sourcemaps.init({loadMaps: false}))
        .pipe(sass({outputStyle: 'compressed'}))
        .pipe(autoprefixer(['last 15 versions', '> 1%', 'ie 8', 'ie 7']))
        .pipe(sourcemaps.write(false))
        .pipe(dest('../biasa'))
}

// Watch changes on all *.scss files and trigger buildStyles() at the end.
function watchFiles() {
    watch(
        ['assets/scss/*.scss', 'assets/scss/**/*.scss'],
        {events: 'all', ignoreInitial: false},
        series(buildStyles)
    );
}

// Init Sass linter.
function sassLint() {
    return src(['assets/scss/*.scss', 'assets/scss/**/*.scss'])
        .pipe(cache('sasslint'))
        .pipe(sasslint({
            configFile: '.sass-lint.yml'
        }))
        .pipe(sasslint.format())
        .pipe(sasslint.failOnError());
}

// Export commands.
exports.default = parallel(sassLint, watchFiles); // $ gulp
exports.sass = buildStyles; // $ gulp sass
exports.watch = watchFiles; // $ gulp watch
exports.build = series(buildStyles); // $ gulp build
