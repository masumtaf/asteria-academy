<?php 
namespace Asteria\Academy;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Frontend {

    public function __construct(){
       
        new Frontend\Shortcode();
    }

}