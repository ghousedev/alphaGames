<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Alpha_Games
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <?php wp_head(); ?>
</head>

<div id="page" class="site">
  <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'alphagames'); ?></a>
  <aside class="mdc-drawer mdc-drawer--modal">
    <div class="mdc-drawer__header">
      <img src="<?php bloginfo('stylesheet_directory') ?>/images/alphalogo.png" />
    </div>
    <div class="mdc-drawer__content">
      <nav class="mdc-list">
        <a class="mdc-list-item mdc-list-item--activated" href="https://www.alphagames.co.uk" aria-selected="true">
          <i class="material-icons mdc-list-item__graphic" aria-hidden="true">home</i>
          <span class="mdc-list-item__text">Home</span>
        </a>
        <a class="mdc-list-item" href="https://www.alphagames.co.uk/facebook-event/">
          <i class="material-icons mdc-list-item__graphic" aria-hidden="true">event</i>
          <span class="mdc-list-item__text">Upcoming Events</span>
        </a>
        <a class="mdc-list-item" href="https://www.alphagames.co.uk/previous_events/">
          <i class="material-icons mdc-list-item__graphic" aria-hidden="true">event</i>
          <span class="mdc-list-item__text">Previous Events</span>
        </a>
        <!-- <a class="mdc-list-item" href="https://www.alphagames.co.uk/gallery">
          <i class="material-icons mdc-list-item__graphic" aria-hidden="true">image</i>
          <span class="mdc-list-item__text">Gallery</span>
        </a> -->
        <a class="mdc-list-item" href="https://alphagames.co.uk/privacy-policy">
          <i class="material-icons mdc-list-item__graphic" aria-hidden="true">https</i>
          <span class="mdc-list-item__text">Privacy Policy</span>
        </a>
      </nav>
      <div class="menu-socials" role="toolbar">
        <a href="https://facebook.com/alphagamesuk" class="mdc-icon-button" aria-pressed="false" aria-hidden="false" aria-label="Facebook" data-mdc-ripple-is-unbounded="true"><i class="fa fa-facebook-square"></i></a>
        <a href="#" class="mdc-icon-button" aria-pressed="false" aria-hidden="false" aria-label="Instagram" data-mdc-ripple-is-unbounded="true"><i class="fa fa-instagram"></i></a>
        <a href="#" class="mdc-icon-button" aria-pressed="false" aria-hidden="false" aria-label="Twitter" data-mdc-ripple-is-unbounded="true"><i class="fa fa-twitter"></i></a>
      </div>
    </div>
  </aside>

  <div class="mdc-drawer-scrim"></div>
  <div id="header">
    <header class="mdc-top-app-bar mdc-top-app-bar--fixed">
      <div class="mdc-top-app-bar__row">
        <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
          <a class="material-icons mdc-top-app-bar__navigation-icon md-light md-24">menu</a><span class="mdc-top-app-bar__title">Alpha <b>Games</b></span>
        </section>
        <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end" role="toolbar">
          <a href="https://facebook.com/alphagamesuk" class="mdc-top-app-bar__action-item mdc-top-app-bar__action-item--unbounded" aria-pressed="false" aria-hidden="false" aria-label="Facebook" data-mdc-ripple-is-unbounded="true"><i class="fa fa-facebook-square fa-2x"></i></a>
          <a href="#" class="mdc-top-app-bar__action-item mdc-top-app-bar__action-item--unbounded" aria-pressed="false" aria-hidden="false" aria-label="Instagram" data-mdc-ripple-is-unbounded="true"><i class="fa fa-instagram fa-2x"></i></a>
          <a href="#" class="mdc-top-app-bar__action-item mdc-top-app-bar__action-item--unbounded" aria-pressed="false" aria-hidden="false" aria-label="Twitter" data-mdc-ripple-is-unbounded="true"><i class="fa fa-twitter fa-2x"></i></a>
        </section>
      </div>
  </div>
  </section>
  <?php get_template_part( '/template-parts/progressbar', 'none' ) ?>
  <body <?php body_class(); ?>>

    <div id="content" class="site-content">