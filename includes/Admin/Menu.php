<?php
namespace Asteria\Academy\Admin;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Menu{


    public $addressBook;

    public function __construct( $addressBook ){

        $this->addressBook = $addressBook;

        add_action( 'admin_menu' , [ $this, 'admin_menu' ] );

    }

    public function admin_menu() {
        
        $parent_slug ='asteria-academy';
        $capability = 'manage_options';

        add_menu_page( __( 'Asteria Academy', 'asteria-academy' ), __( 'Asteria Ac','asteria-academy' ), $capability , $parent_slug ,[ $this->addressBook, 'plugin_page' ] ,'dashicons-welcome-learn-more', 30 );

        add_submenu_page($parent_slug, __( 'Address Book', 'asteria-academy' ), __( 'Address Book', 'asteria-academy' ) , $capability , $parent_slug, [ $this->addressBook, 'plugin_page' ] );

        add_submenu_page($parent_slug,  __( 'Settings Page', 'asteria-academy' ) , __( 'Settings', 'asteria-academy' ) , $capability , 'asteria-settings', [ $this, 'asteria_settings_page' ] );
    }

    // public function asteria_menu_page(){
    //     // $asteria_meu_page = new AddressBook();
    //     $asteria_meu_page->plugin_page();
    // }

    public function asteria_settings_page(){
        echo  "settings page";
    }

}