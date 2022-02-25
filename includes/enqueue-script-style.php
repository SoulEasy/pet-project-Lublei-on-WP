<?php 
if ( ! defined('ABSPATH')){
    exit;//Exit if accessed directly
} 

add_action('wp_enqueue_scripts','Lublei_scripts');

function Lublei_scripts(){
    wp_enqueue_style('Lublei_style', get_stylesheet_uri());
    wp_enqueue_style('fonts_style', get_template_directory_uri() . '/fonts.css' );

    wp_enqueue_script('Lublei-jquery', get_template_directory_uri() . '/assets/js/jquery-3.6.0.min.js');
    wp_enqueue_script('Lublei-slcik', get_template_directory_uri() . '/assets/js/slick.min.js');
    wp_enqueue_script('Lublei-script', get_template_directory_uri() . '/assets/js/script.js');
};
?>