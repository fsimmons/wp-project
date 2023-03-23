<?php
/**
 * Template for header
 *
 * <head> section and everything up until <div id="content">
 *
 * @Author: Roni Laukkarinen
 * @Date: 2020-05-11 13:17:32
 * @Last Modified by:   Your name
 * @Last Modified time: 2023-03-21 14:57:49
 *
 * @package air-light
 */

namespace Air_Light;

?>

<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <title><?php printf( get_bloginfo ( 'name' ) ); ?></title>
  <meta name="description" content="<?php printf( get_bloginfo ( 'description' ) ); ?>">

  <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-P2CWFK7');</script>
  <!-- End Google Tag Manager -->
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="http://gmpg.org/xfn/11">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P2CWFK7"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
  <a role="button" class="skip-link screen-reader-text js-trigger" href="#content"><?php echo esc_html( get_default_localization( 'Skip to content' ) ); ?></a>

  <?php wp_body_open(); ?>
  <div id="page" class="site">

    <header class="site-header">
      <div class="header-wrapper">

        <?php get_template_part( 'template-parts/header/branding' ); ?>
        <?php get_template_part( 'template-parts/header/navigation' ); ?>
    
      </div>
    </header>

    <div class="site-content">