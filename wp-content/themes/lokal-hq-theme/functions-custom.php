<?php
/**
 * @Author: Your name
 * @Date:   2023-03-02 23:18:22
 * @Last Modified by:   Your name
 * @Last Modified time: 2023-03-21 00:25:27
 */

if (function_exists('acf_add_options_page')) {
  acf_add_options_page('Footer');
}

function _s_cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';

    return $mimes;
}

add_filter('upload_mimes', '_s_cc_mime_types');


/**
 * Custom Pallette
 */
function _s_register_colors()
{
    add_theme_support('editor-color-palette', array(
        array(
            'name' => __('Black', '_s'),
            'slug' => 'black',
            'color' => '#000',
        ),
        array(
          'name' => __('Dark Gray', '_s'),
          'slug' => 'dark-gray',
          'color' => '#434343',
        ),
        array(
            'name' => __('Gray', '_s'),
            'slug' => 'gray',
            'color' => '#C4C4C4',
        ),
        array(
          'name' => __('Light Gray', '_s'),
          'slug' => 'light-gray',
          'color' => '#EEEEEE',
        ),
        array(
            'name' => __('White', '_s'),
            'slug' => 'white',
            'color' => '#ffffff',
        ),
        array(
            'name' => __('Lime Green', '_s'),
            'slug' => 'lime-green',
            'color' => '#00E35D',
        ),

    ));
}
add_action('after_setup_theme', '_s_register_colors');

add_theme_support(
    'editor-gradient-presets',
    array(
        array(
            'name'     => __('White to Grey', 'white-to-grey-gradient'),
            'gradient' => 'linear-gradient(0deg, rgba(255,255,255,1) 50%, rgba(238,238,238,1) 50%)',
            'slug'     => 'white-to-grey'
        ),
    )
);

/**
 * Get the colors formatted for use with Iris, Automattic's color picker
 */
function output_the_colors()
{
    // get the colors
    $color_palette = current((array) get_theme_support('editor-color-palette'));

    // bail if there aren't any colors found
    if (!$color_palette) {
        return;
    }

    // output begins
    ob_start();

    // output the names in a string
    echo '[';
    foreach ($color_palette as $color) {
        echo "'" . $color['color'] . "', ";
    }
    echo ']';

    return ob_get_clean();
}

/**
 * Add the colors into Iris
 */
function _s_gutenberg_sections_register_acf_color_palette()
{
    $color_palette = output_the_colors();
    if (!$color_palette) {
        return;
    } ?>
    <script type="text/javascript">
    (function($) {
        acf.add_filter('color_picker_args', function(args, $field) {
            // add the hexadecimal codes here for the colors you want to appear as swatches
            args.palettes = <?php echo $color_palette; ?>
                // return colors
                return args;
        });
    })(jQuery);
    </script>
<?php
}
add_action('acf/input/admin_footer', '_s_gutenberg_sections_register_acf_color_palette');


/*
 * Customize the WP Admin Login Logo
 */
function _s_custom_login_logo()
{
    ?>
<style type="text/css">
    #login h1 a,
    .login h1 a {
        background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/svg/logo.svg');
        height: 130px;
        width: 320px;
        background-size: 320px 130px;
        background-repeat: no-repeat;
        padding-bottom: 10px;
    }

    #wp-submit {
        background-color: #00E35D;
        border-color: #00E35D;
        border-radius: 0;
        color: black;
    }

    .login input[type=text],
    .js.login input.password-input {
        border-radius: 0;
    }

    .login input[type=text]:focus,
    .js.login input.password-input:focus {
        border-color: #00E35D;
        box-shadow: 0 0 0 1px #00E35D;
    }

    .login #login_error, .login .message, .login .success {
        border-left: 4px solid black;
    }
</style>
<?php
}
add_action('login_enqueue_scripts', '_s_custom_login_logo');

/*
 * Customize the WP Admin Login URL
 */
function _s_custom_login_logo_url()
{
    return home_url();
}
add_filter('login_headerurl', '_s_custom_login_logo_url');

/*
 * Customize the WP Admin Login URL
 */
function _s_custom_login_logo_url_title()
{
    return 'Lokal HQ';
}
add_filter('login_headertext', '_s_custom_login_logo_url_title');


