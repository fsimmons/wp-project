<?php
/**
 * Custom List
 *
 * CTA block.
 *
 * @Author:		Tuomas Marttila
 * @Date:   		2021-12-15 10:20:37
 * @Last Modified by:   Your name
 * @Last Modified time: 2023-03-21 11:43:40
 *
 * @package air-blocks
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */

 namespace Air_Light;

// Fields
$title = get_field( 'title' );
$items = get_field( 'items' );
$subtitle = get_field( 'subtitle' );

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

<section class="block block-custom-list block-bg--<?php echo $bg_color; ?>" >

    <div class="flex-box">
      <div class="small-column">
        <?php echo $subtitle; ?>
        <h2 class="heading-entry">
        <?php echo $title; ?>
        </h2>
      </div>

      <div class="large-column">
      <?php
        if (have_rows('items')):
            $list_title = get_field('list_title');
            ?>
            <h3 class="list-title">
              <?php echo esc_html( $list_title ); ?>
            </h3>
            <?php
            while (have_rows('items')) : the_row();
                $image = get_sub_field('item_icon');
                
                $item_content = get_sub_field('item_content');
                ?>
                <div class="list-item">
                  <?php
                    $image = get_sub_field('item_icon');
                    $size = 'medium';
                    echo wp_get_attachment_image( $image, $size );
                  ?>
                  <h4 class="">
                    <?php echo esc_html( $item_content ); ?>
                  </h4>
                </div>
                <?php
            endwhile;
        endif;
      ?>
      </div>
    </div>

</section>
