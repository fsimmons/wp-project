/**
 * @Author: Your name
 * @Date:   2023-03-14 12:30:24
 * @Last Modified by:   Your name
 * @Last Modified time: 2023-03-20 14:06:10
 */
// Dependencies
const { src } = require('gulp');
const phpcsplugin = require('gulp-phpcs');
const config = require('../config.js');

// Task
function phpcs(cb) {
  return src(config.phpcs.src)

    // Validate files using PHP Code Sniffer
    .pipe(phpcsplugin(config.phpcs.opts))

    // Log all problems that was found
    .pipe(phpcsplugin.reporter('log'));
  cb();
}

exports.phpcs = phpcs;
