<?php
/**
 * Side Cards 
 *
 * Side Cards block.
 *
 * @Author:		Tuomas Marttila
 * @Date:   		2021-12-15 10:20:37
 * @Last Modified by:   Your name
 * @Last Modified time: 2023-03-21 11:44:06
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

<section class="block block-side-cards block-bg--<?php echo $bg_color; ?>" >
  <div class="container">
    <div class="flex-box">
      <div class="small-column">
        <h2 class="heading-hero">
        <?php echo $title; ?>
        </h2>
      </div>

      <div class="large-column">
      <?php
        if (have_rows('items')):
            while (have_rows('items')) : the_row();
                $item_title = get_sub_field('item_title');
                $item_content = get_sub_field('item_content');
                ?>
                <div class="side-card">
                <h4 class="">
                  <?php echo esc_html( $item_title ); ?>
                </h4>
                <p class="">
                  <?php echo esc_html( $item_content ); ?>
                </p>
                </div>
                <?php
            endwhile;
        endif;
      ?>
      </div>
    </div>
  </div>
</section>
