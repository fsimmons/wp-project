<?php
/**
 * Hero
 *
 * Hero with full height, optionally shows a video background.
 *
 * @Author:		Elias Kautto
 * @Date:   		2021-11-10 16:02:02
 * @Last Modified by:   Your name
 * @Last Modified time: 2023-03-21 11:43:32
 *
 * @package air-blocks
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */

namespace Air_Light;

// Fields
$upper_title = get_field( 'upper_title' );
$title = get_field( 'title' );
$content = get_field( 'content' );
$button = get_field( 'button' );
$video = get_field( 'video' );
$bg_image = get_field( 'bg_image' );


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


if ( empty( $bg_image ) ) {
  $bg_image = get_post_thumbnail_id( get_the_ID() );
}

if ( empty( $title ) ) {
  maybe_show_error_block( 'No required information added' );
  return;
}
?>

<section class="block block-hero-splash block-bg--<?php echo $bg_color; ?>">
  <div class="shade" aria-hidden="true"></div>
  <div class="container">

  <?php if ( ! empty( $bg_image ) ) : ?>
    <div class="image image-background">
      <?php native_lazyload_tag( $bg_image ); ?>
    </div>
  <?php endif; ?>

    <?php if ( ! empty( $video ) ) : ?>
      <video src="<?php echo esc_url( $video['url'] ); ?>" loop muted autoplay playsinline></video>
    <?php endif; ?>

    <div class="hero-content content">
      <div class="content-wrapper">

        <?php if ( ! empty( $upper_title ) ) : ?>
          <p class="prefix">
            <?php echo esc_html( $upper_title ); ?>
          </p>
        <?php  endif; ?>

        <h1 class="heading-hero" id="content">
          <?php echo $title; ?>
        </h1>

        <?php if ( ! empty( $content ) ) :
          echo wp_kses_post( wpautop( $content ) );
        endif;

        if ( ! empty( $button ) ) : ?>
          <p class="button-wrapper">
            <a class="button button-large<?php if ( str_contains( $button['url'], '#' ) ) echo ' js-trigger'; ?>" target="<?php if ( $button['target'] )  echo '_blank'; ?>" href="<?php echo esc_url( $button['url'] ); ?>">
              <?php echo esc_html( $button['title'] ); ?>

            </a>
          </p>
        <?php endif; ?>
      </div>
    </div>

  </div>
</section>