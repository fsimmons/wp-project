<?php
/**
 * Carousel
 *
 * Carousel block.
 *
 * @Author:		Tuomas Marttila
 * @Date:   		2021-12-15 10:20:37
 * @Last Modified by:   Your name
 * @Last Modified time: 2023-03-21 15:05:58
 *
 * @package air-blocks
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */

namespace Air_Light;

// Fields
$title = get_field( 'title' );
$items = get_field( 'items' );

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

if ( empty( $items ) ) {
  maybe_show_error_block( 'No required information added' );
  return;
}

?>

<section class="block block-cards block-carousel has-unified-padding-if-stacked is-carousel block-bg--<?php echo $bg_color; ?>"" >
  <div class="container">
    <div class="swiper-container">
    <div class="flex-box">
      <h2 class="heading-hero">
        <?php echo esc_html( $title ); ?>
      </h2>
      <div class="swiper-controls">
        
        <button role="button" class="swiper-actions swiper-button-prev">
          <?php include get_theme_file_path( '/svg/slider-left-arrow.svg' ); ?>
        </button>

        <button role="button" class="swiper-actions swiper-button-next">
          <?php include get_theme_file_path( '/svg/slider-right-arrow.svg' ); ?>
        </button>
      </div>
    </div>

      <div class="swiper-wrapper">
      <?php
            while (have_rows('items')) : the_row();
                $item_title = get_sub_field('item_title');
                $image = get_sub_field('item_image');
                $image_size = 'large';
                $image_obj = wp_get_attachment_image($image, $image_size);
                ?>
                <div class="swiper-slide card-slider">
                <div class="card-slider-image">
                  <?php echo $image_obj ?>
                  </div>
                  <div class="card-slider-content">
                    <h6>
                      <?php echo esc_html( $item_title ); ?>
                    </h6>
                  </div>
                </div>
                <?php
            endwhile;
          ?>
      </div>

    </div>

  </div>
</section>