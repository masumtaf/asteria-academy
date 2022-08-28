<?php 
namespace Asteria\Academy;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Admin {

    public function __construct(){

        $this->dispatch_action();

        new Admin\Menu();
        
    }

    public function dispatch_action(){
        $addressBook  = new Admin\AddressBook();

        add_action( 'admin_init', [ $addressBook, 'form_handler' ] );
    }
    
}