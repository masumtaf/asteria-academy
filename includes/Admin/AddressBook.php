<?php 

namespace Asteria\Academy\Admin;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}


class AddressBook{

    public function plugin_page(){
    
        $action = isset( $_GET['action'] ) ? isset( $_GET['action'] ) : 'list';

        switch ( $action ){

            case 'new':
                $templ = __DIR__ . '/tabs/new-address.php';
                break;
            case 'edit':
                $templ = __DIR__ . '/tabs/edit-address.php';
                break;
            case 'view': 
                $templ = __DIR__ . '/tabs/view-address.php';
                break;
            default:
                $templ = __DIR__ . '/tabs/list-address.php';
                break;

        }

        if ( file_exists( $templ ) ) {
            include $templ;
    
        }

    }

    public function form_handler() {

        if ( ! isset( $_POST['asteria_submit_address'] ) ) {
            return;
        }

        if( ! wp_verify_nonce( $_POST['_wpnonce'], 'asteris-new-address' ) ) {
            wp_die( 'R U Cheating ????' );
        }
        if ( ! current_user_can( 'manage_options') ){
            wp_die( 'R U Cheating ????' );
        }
    }

}