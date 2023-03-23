<?php
/**
 * Template for displaying the footer
 *
 * Description for template.
 *
 * @Author: Roni Laukkarinen
 * @Date: 2020-05-11 13:33:49
 * @Last Modified by:   Your name
 * @Last Modified time: 2023-03-21 00:12:01
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package air-light
 */

namespace Air_Light;

?>

</div><!-- #content -->

<footer id="colophon" class="site-footer">
  <div class="container">
    <div class="footer-wrapper">
      <div class="footer-side footer-side--left">
        <div class="small-text">
          &copy; <?php echo date('Y'); echo esc_html__( ' Lokal. All Rights Reserved.' ); ?>
        </div>
      </div>
      <div class="footer-side footer-side--right">
        <div class="footer-socials">
          <?php
                    get_template_part('template-parts/content', 'social');
              ?>
        </div>
      </div>
    </div>
  </div>
</footer><!-- #colophon -->

</div><!-- #page -->

<?php 
wp_footer(); 
air_edit_link();
    
?>

<a
  href="#page"
  id="top"
  class="top no-external-link-indicator"
  data-version="<?php echo esc_attr( AIR_LIGHT_VERSION ); ?>"
>
  <span class="screen-reader-text"><?php echo esc_html( get_default_localization( 'Back to top' ) ); ?></span>
  <span aria-hidden="true">&uarr;</span>
</a>

</body>
</html>