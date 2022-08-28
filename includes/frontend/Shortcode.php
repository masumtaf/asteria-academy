<?php
namespace Asteria\Academy\Frontend;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Shortcode{

    public function __construct(){
    
        add_shortcode( 'ast-scode', [ $this, 'render_shortcode' ] );
    }

    public function render_shortcode( $attr, $content = '' ) {
        return "Hello, I am form shortcode";
    }
    
}