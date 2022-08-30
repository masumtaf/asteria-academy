<?php 

namespace Asteria\Academy\Admin;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}


class AddressBook{

    public $errors = [];

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

        $name = isset( $_POST['name'] ) ? sanitize_text_field( $_POST['name'] ) : '';
        $phone = isset( $_POST['phone'] ) ? sanitize_text_field( $_POST['phone'] ) : '';
        $email = isset( $_POST['email'] ) ? sanitize_text_field( $_POST['email'] ) : '';
        $address = isset( $_POST['address'] ) ? sanitize_textarea_field( $_POST['address'] ) : '';
       
        if ( empty( $name ) ){
            $this->errors['name'] = __( 'Please provide a name' , 'asteria-academy' );
        }

        if ( empty( $phone ) ){
            $this->errors['phone'] = __( 'Please provide a phone number' , 'asteria-academy' );
        }

        if ( empty( $email ) ){
            $this->errors['email'] = __( 'Please provide a email address' , 'asteria-academy' );
        }  
         
        if ( empty( $address ) ){
            $this->errors['address'] = __( 'Please provide a address address' , 'asteria-academy' );
        }

        if ( ! empty( $this->errors ) ) {
            return;
        }

        $inserted_id = asteria_ac_insert_address([
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
            'address' => $address
        ]);

        if ( is_wp_error( $inserted_id ) ) {
            wp_die( $inserted_id->get_error_massage() );
        }

        //redirect 
        $redirect_to = admin_url( 'admin.php?page=asteria-academy&inserted=true' );
        
        wp_redirect( $redirect_to );

        exit;

    }

}