<?php
/**
 * Custom Tabs
 *
 * CTA block.
 *
 * @Author:		Tuomas Marttila
 * @Date:   		2021-12-15 10:20:37
 * @Last Modified by:   Your name
 * @Last Modified time: 2023-03-23 13:41:38
 *
 * @package air-blocks
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */

 namespace Air_Light;

// Fields
$title = get_field( 'title' );
$items = get_field( 'tabs' );

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

<section class="block block-tabs block-bg--<?php echo $bg_color; ?>" >
    <div class="tabs-inner">    
    <?php
        if (have_rows('tabs')):
    ?>
        <ul id="tab-menu" class="tab-menu">
            <?php
                $count_num = 0;
                while (have_rows('tabs')): the_row();
                    $title = get_sub_field('title');
                    $text = get_sub_field('text');
            ?>
                <li class="list-wrapper <?php echo $count_num == 0 ? ' active' : ''; ?>">
                    <a href="#tab-<?php echo $count_num; ?>"
                        class="tab-menu-link<?php echo $count_num == 0 ? ' active' : ''; ?>"
                        data-content="tab-<?php echo $count_num; ?>" data-title="<?php echo $title; ?>">
                        <h3><?php echo $title; ?></h3>
                    </a><!-- .tab-menu-link -->
                    <div class="tab-menu-text<?php echo $count_num == 0 ? ' active' : ''; ?>">
                        <p><?php echo $text; ?></p>
                    </div>
                </li>
            <?php
                    $count_num++;
                endwhile;
            ?>
        </ul><!-- .tab-menu -->
        <div class="tab-content">
            <?php
                $count_number = 0;
                while (have_rows('tabs')): the_row(); ?>
                    <div id="tab-<?php echo $count_number ?>"
                        class="tab-bar-content<?php echo $count_number == 0 ? ' active' : ''; ?>">
                            <?php
                                $image = get_sub_field('image');
                                $size = 'large';
                                echo wp_get_attachment_image( $image, $size );
                            ?>
                    </div><!-- .tab-bar-content -->
                <?php
                    $count_number++;
                endwhile;
            ?>
        </div><!-- .tab-content -->

    <?php
        endif;
    ?>
    </div><!-- .tabordion -->
</section>
<script>



var element = document.querySelectorAll('#tab-menu a');

if (element) {

    element.forEach(function(el, key){
        el.addEventListener('click', function (e) {
            e.preventDefault();
            el.classList.toggle("active");
            el.parentNode.classList.toggle("active");
            el.parentNode.querySelector('.tab-menu-text').classList.toggle("active");
            $el_href = el.getAttribute('href');
            $el_href = $el_href.replace('#', '');
            document.querySelector('.tab-bar-content[id='+$el_href+']').classList.toggle("active");

            element.forEach(function(ell, els){
                if(key !== els) {
                    ell.classList.remove('active');
                    ell.parentNode.classList.remove("active");
                    ell.parentNode.querySelector('.tab-menu-text').classList.remove("active");
                    $ell_href = ell.getAttribute('href');
                    $ell_href = $ell_href.replace('#', '');
                    document.querySelector('.tab-bar-content[id='+$ell_href+']').classList.remove("active");
                }
            });
        });
    });
}

</script>
