<?php 
namespace Asteria\Academy;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Admin {

    public function __construct(){

        $addressBook  = new Admin\AddressBook();

        $this->dispatch_action( $addressBook );

        new Admin\Menu( $addressBook );
        
    }

    public function dispatch_action( $addressBook ){
        
        add_action( 'admin_init', [ $addressBook, 'form_handler' ] );
    }
    
}