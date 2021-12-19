<?php
/*
 * Plugin Name:       Amebae Block Gutenberg
 * Description:       Amebae Block Gutenberg is a addon plugin for Gutenberg.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Minh Beplus
 * License:           GPL v2 or later
 * Text Domain:       amebae-block-gutenberg
 * Domain Path:       /languages
 */

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

{
  /**
   * Define
   */
  define('AMB_VERSION', '1.0.0');
  define('AMB_DIR', plugin_dir_path(__FILE__));
  define('AMB_URI', plugin_dir_url(__FILE__));
}

{
  /**
   * Blocks
   */
  require_once(AMB_DIR . '/blocks/loader.php');
}
