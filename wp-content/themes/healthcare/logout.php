<?php 
/**
 * Template Name: Logout
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage healthcare
*/
session_start();
session_destroy();
$url=site_url();
wp_redirect($url);
exit();
?>
