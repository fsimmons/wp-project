<?php
/**
 * @Author: Your name
 * @Date:   2023-03-03 07:59:01
 * @Last Modified by:   Your name
 * @Last Modified time: 2023-03-21 14:17:17
 */

$twitter = get_field('twitter_link', 'options');
$enable_twitter = get_field('enable_twitter', 'options');
$facebook = get_field('facebook_link', 'options');
$enable_facebook = get_field('enable_facebook', 'options');
$linkedin = get_field('linkedin_link', 'options');
$enable_linkedin = get_field('enable_linkedin', 'options');
$instagram = get_field('instagram_link', 'options');
$enable_instagram = get_field('enable_instagram', 'options');
$youtube = get_field('youtube_link', 'options');
$enable_youtube = get_field('enable_youtube', 'options');
$tiktok = get_field('tiktok_link', 'options');
$enable_tiktok = get_field('enable_tiktok', 'options');

if ($twitter && $enable_twitter):
?>
<a href="<?php echo $twitter ?>" target="_blank" rel="noreferrer">
    <img src="<?php echo esc_url( get_template_directory_uri() . '/svg/social-icons/twitter.svg' ); ?>" alt="Twitter Icon" width="32" height="32">
</a>
<?php
endif;

if ($facebook && $enable_facebook):
?>
<a href="<?php echo $facebook ?>" target="_blank" rel="noreferrer">
    <img src="<?php echo esc_url( get_template_directory_uri() . '/svg/social-icons/facebook.svg' ); ?>" alt="Facebook Icon" width="32" height="32">
</a>
<?php
endif;

if ($youtube && $enable_youtube):
?>
<a href="<?php echo $youtube ?>" target="_blank" rel="noreferrer">
<img src="<?php echo esc_url( get_template_directory_uri() . '/svg/social-icons/youtube.svg' ); ?>" alt="Youtube Icon" width="32" height="32" >
</a>
<?php
endif;

if ($instagram && $enable_instagram):
?>
<a href="<?php echo $instagram ?>" target="_blank" rel="noreferrer">
<img src="<?php echo esc_url( get_template_directory_uri() . '/svg/social-icons/instagram.svg' ); ?>" alt="Instagram Icon" width="32" height="32">
</a>
<?php
endif;

if ($linkedin && $enable_linkedin):
    ?>
    <a href="<?php echo $linkedin ?>" target="_blank" rel="noreferrer">
    <img src="<?php echo esc_url( get_template_directory_uri() . '/svg/social-icons/linkedin.svg' ); ?>" alt="Linkedin Icon" width="32" height="32" >

    </a>
<?php
endif;

if ($tiktok && $enable_tiktok):
    ?>
    <a href="<?php echo $tiktok; ?>" target="_blank" rel="noreferrer">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/svg/social-icons/tiktok.svg' ); ?>" alt="Tiktok Icon" width="32" height="32">

    </a>
<?php
endif;
?>
