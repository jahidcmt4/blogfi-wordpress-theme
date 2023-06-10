<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blogfi
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="profile" href="https://gmpg.org/xfn/11">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'blogfi'); ?></a>

    <?php
    $blogfi_topheader = get_theme_mod('blogfi_top_head_field');
    if (1 != $blogfi_topheader) { ?>


      <div class="header-top-area">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
              <div class="top-contact">
                <ul>
                  <?php
                  $blogfi_email = !empty(get_theme_mod('blogfi_email_field')) ? get_theme_mod('blogfi_email_field') : __("+2808272282","blogfi");
                  if ($blogfi_email) { ?>
                    <li><i class="fa fa-envelope"></i>
                      <?php
                      printf(
                        __('%s', 'blogfi'),
                        $blogfi_email
                      );
                      ?>
                    </li>
                  <?php } ?>
                  <?php
                  $blogfi_phone = !empty( get_theme_mod('blogfi_phone_field') ) ? get_theme_mod('blogfi_phone_field') : __("info@yourmail.com","blogfi");
                  if ($blogfi_phone) { ?>
                    <li><i class="fa fa-phone"></i>
                      <?php
                      printf(
                        __('%s', 'blogfi'),
                        $blogfi_phone
                      );
                      ?>
                    </li>
                  <?php } ?>

                </ul>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 text-right">
              <div class="social-profile">
                <ul>
                  <?php
                  $blogfi_facebook_url = !empty(get_theme_mod('blogfi_facebook_field')) ? get_theme_mod('blogfi_facebook_field') : esc_html("https://www.facebook.com/");
                  if ($blogfi_facebook_url) { ?>
                    <li><a href="<?php echo $blogfi_facebook_url; ?>"><i class="fa fa-facebook"></i></a></li>
                  <?php } ?>
                  <?php
                  $blogfi_twitter_url = !empty(get_theme_mod('blogfi_twitter_field')) ? get_theme_mod('blogfi_twitter_field') : esc_html("https://www.twitter.com/");
                  if ($blogfi_twitter_url) { ?>
                    <li><a href="<?php echo $blogfi_twitter_url; ?>"><i class="fa fa-twitter"></i></a></li>
                  <?php } ?>
                  <?php
                  $blogfi_youtube_url = !empty(get_theme_mod('blogfi_youtube_field')) ? get_theme_mod('blogfi_youtube_field') : esc_html("https://www.youtube.com/");
                  if ($blogfi_youtube_url) { ?>
                    <li><a href="<?php echo $blogfi_youtube_url; ?>"><i class="fa fa-youtube"></i></a></li>
                  <?php } ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>


    <header id="masthead" class="site-header">
      <div class="header-area">
        <div id="site-nav-wrap">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <nav class="main-navigation navbar navbar-expand-lg navbar-light">
                <?php

                if (has_custom_logo()) {
                  if (function_exists('the_custom_logo')) {
                    the_custom_logo();
                  }
                } else {
                  echo '<a class="navbar-brand logo" href="' . esc_url(home_url()) . '">';
                  echo get_bloginfo('name');
                  echo '</a>';
                }

                ?>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarmobile" aria-controls="navbarmobile" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'blogfi'); ?>">
                  <i class="fa fa-bars" aria-hidden="true"></i>
                </button>

                <?php
                wp_nav_menu(
                  array(
                    'menu_id'          => 'primary-menu',
                    'container'         => "div",
                    'container_class'   => "collapse navbar-collapse menu",
                    'container_id'      => "navbarmobile",
                    'menu_class'       => "nav navbar-nav ml-auto nav-pills",
                    'depth'           =>   "2",
                    'fallback_cb'       => "WP_Bootstrap_Navwalker::fallback",
                    'walker'          => new WP_Bootstrap_Navwalker(),
                    'theme_location'   => 'header-menu',
                  )
                );
                ?>


              </nav>

            </div>
          </div>
        </div>
        </div>
        
      </div>
    </header>