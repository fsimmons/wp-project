/**
 * @Author: Your name
 * @Date:   2023-03-10 11:41:16
 * @Last Modified by:   Your name
 * @Last Modified time: 2023-03-13 14:06:08
 */
// Dependencies
const {
  src
} = require('gulp');
const stylelint = require('@ronilaukkarinen/gulp-stylelint');
const config = require('../config.js');

// Task
function lintstyles() {

  return src([config.styles.stylelint.src])

    // Print linter report
    .pipe(stylelint(config.styles.stylelint.opts));
}

exports.lintstyles = lintstyles;
