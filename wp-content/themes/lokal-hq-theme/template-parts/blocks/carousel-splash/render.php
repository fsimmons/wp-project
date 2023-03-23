<?php
/**
 * Carousel Splash
 *
 * Carousel block.
 *
 * @Author:		Tuomas Marttila
 * @Date:   		2021-12-15 10:20:37
 * @Last Modified by:   Your name
 * @Last Modified time: 2023-03-13 18:54:16
 *
 * @package air-blocks
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */

namespace Air_Light;

// Fields
$title = get_field( 'title' );

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

if ( empty( $title ) ) {
  maybe_show_error_block( 'No required information added' );
  return;
}

?>

<section class="block block-carousel has-unified-padding-if-stacked is-carousel block-bg--<?php echo $bg_color; ?>" >
  <div class="container">

  <?php
        if (have_rows('items')):
          ?>
          <h2 class="heading-hero">
              <?php echo $title; ?>
          </h2>
          <div class="three-carousel-columns">
          <?php
            while (have_rows('items')) : the_row();
                $item_title = get_sub_field('item_title');
                $image = get_sub_field('item_image');
                $image_size = 'large';
                $image_obj = wp_get_attachment_image($image, $image_size);
                ?>
                <div class="three-carousel-columns__item card-slider">
                  <div class="card-slider-image">
                    <?php echo $image_obj; ?>
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
        <?php
        endif;
    ?>

  </div>
</section>

<script>

</script>
