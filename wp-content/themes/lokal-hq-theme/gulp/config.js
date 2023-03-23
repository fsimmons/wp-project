/**
 * @Author: Your name
 * @Date:   2023-03-10 11:41:16
 * @Last Modified by:   Your name
 * @Last Modified time: 2023-03-18 18:19:33
 */
// Set theme dir
const themeDir = './';
const proxyUrl = 'http://lokal-hq-com.local/';

module.exports = {
  cssnano: {
    "preset": [
      "cssnano-preset-advanced",
      {
        "discardComments": {
          "removeAll": true
        }
      }
    ],
  },
  size: {
    gzip: true,
    uncompressed: true,
    pretty: true,
    showFiles: true,
    showTotal: false,
  },
  rename: {
    min: {
      suffix: '.min'
    }
  },
  browsersync: {
    // Important! If src is wrong, styles will not inject to the browser
    src: [
      themeDir + '**/*.php',
      themeDir + 'css/**/*',
      themeDir + 'js/dev/**/*'
    ],
    opts: {
      logLevel: 'debug',
      injectChanges: true,
      proxy: proxyUrl,
      browser: 'Google Chrome',
      open: false,
      notify: true,
    },
  },
  styles: {
    src: themeDir + 'sass/*.scss',
    development: themeDir + 'css/dev/',
    production: themeDir + 'css/prod/',
    watch: {
      development: themeDir + 'sass/**/*.scss',
      production: themeDir + 'css/dev/*.css',
    },
    opts: {
      development: {
        verbose: true,
        bundleExec: false,
        outputStyle: 'expanded',
        debugInfo: true,
        errLogToConsole: true,
        includePaths: [themeDir + 'node_modules/'],
        quietDeps: true,
      },
      production: {
        verbose: false,
        bundleExec: false,
        outputStyle: 'compressed',
        debugInfo: false,
        errLogToConsole: false,
        includePaths: [themeDir + 'node_modules/'],
        quietDeps: true,
      }
    }
  },
  js: {
    src: themeDir + 'js/src/*.js',
    watch: themeDir + 'js/src/**/*',
    production: themeDir + 'js/prod/',
    development: themeDir + 'js/dev/',
  },
  php: {
    watch: [
      themeDir + '*.php',
      themeDir + 'inc/**/*.php',
      themeDir + 'template-parts/**/*.php'
    ]
  },
  phpcs: {
    src: [themeDir + '**/*.php', '!' + themeDir + 'node_modules/**/*'],
    opts: {
      bin: '/usr/local/bin/phpcs',
      standard: themeDir + 'phpcs.xml',
      warningSeverity: 0
    }
  }
};
