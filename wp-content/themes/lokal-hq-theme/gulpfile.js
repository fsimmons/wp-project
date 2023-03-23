/**
 * @Author: Your name
 * @Date:   2023-03-10 11:41:16
 * @Last Modified by:   Your name
 * @Last Modified time: 2023-03-13 15:14:29
 */
// Export tasks
exports.js = require('./gulp/tasks/js.js').js;
exports.phpcs = require('./gulp/tasks/phpcs.js').phpcs;
exports.lintstyles = require('./gulp/tasks/lintstyles.js').lintstyles;
exports.devstyles = require('./gulp/tasks/devstyles.js').devstyles;
exports.prodstyles = require('./gulp/tasks/prodstyles.js').prodstyles;
exports.watch = require('./gulp/tasks/watch.js').watch;
exports.default = require('./gulp/tasks/watch.js').watch;
