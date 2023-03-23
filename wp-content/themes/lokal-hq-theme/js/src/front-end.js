/**
 * @Author: Your name
 * @Date:   2023-03-10 11:41:16
 * @Last Modified by:   Your name
 * @Last Modified time: 2023-03-13 19:01:07
 */
/* eslint-disable max-len, no-param-reassign, no-unused-vars */
/**
 * Air theme JavaScript.
 */

// Import modules
import reframe from 'reframe.js';
import { styleExternalLinks, initExternalLinkLabels } from './modules/external-link';
import initAnchors from './modules/anchors';
import backToTop from './modules/top';
import initA11ySkipLink from './modules/a11y-skip-link';
import { navDesktop, navMobile } from './modules/navigation';
import initCarousel from './modules/carousel';

// Define Javascript is active by changing the body class
document.body.classList.remove('no-js');
document.body.classList.add('js');

document.addEventListener('DOMContentLoaded', () => {
  initCarousel();
  initAnchors();
  backToTop();
  styleExternalLinks();
  initExternalLinkLabels();
  initA11ySkipLink();


  // Init navigation
  navDesktop();
  navMobile();

  // Fit video embeds to container
  reframe('.wp-has-aspect-ratio iframe');

});


