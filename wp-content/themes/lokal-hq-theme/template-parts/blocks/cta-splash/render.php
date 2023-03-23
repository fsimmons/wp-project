<?php
/**
 * CTA with Newsletter
 *
 * CTA block.
 *
 * @Author:		Tuomas Marttila
 * @Date:   		2021-12-15 10:20:37
 * @Last Modified by:   Your name
 * @Last Modified time: 2023-03-18 18:07:57
 *
 * @package air-blocks
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */

namespace Air_Light;

// Fields
$title = get_field( 'title' );
$content = get_field( 'content' );

$bg_color;
$bg_color_value = get_field( 'bg_color' );
if($bg_color_value == '#ffffff') {
  $bg_color = 'white';
} 
elseif ($bg_color_value == '#000000') {
  $bg_color = 'black';
}
elseif ($bg_color_value == '#eeeeee') {
  $bg_color = 'lightgray';
}
else {
  $bg_color = '';
}

if ( empty( $title ) ) {
  maybe_show_error_block( 'No required information added' );
  return;
}

?>

<section class="block block-cta block-bg--<?php echo $bg_color; ?>" >
  <div class="container">
  <div class="cta-wrapper">

    <h2 class="heading-hero">
      <?php echo  $title; ?>

    </h2>
    <div class="newsletter-form">
    <?php echo do_shortcode( $content); ?>
    </div>
  </div>
  </div>
</section>
