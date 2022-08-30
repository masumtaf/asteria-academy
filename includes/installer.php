<?php 
namespace Asteria\Academy;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}


class Installer{

    public function run(){
        $this->add_version();
        $this->create_tables();
    }

    public function add_version(){

        $insalled = get_option( 'ast_ac_installed' );

        if ( ! $insalled ) {
            update_option( 'ast_ac_installed' , time() );
        }

        update_option( 'ast_ac_installed', AST_AC_VERSION );

    }

    public function create_tables() {
        global $wpdb;

        $charset_collate = $wpdb->get_charset_collate();

        $schema = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}asteria_addresses` (
          `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
          `name` varchar(100) NOT NULL DEFAULT '',
          `phone` varchar(30) DEFAULT NULL,
          `email` varchar(30) DEFAULT NULL,
          `address` varchar(255) DEFAULT NULL,
          `created_by` bigint(20) unsigned NOT NULL,
          `created_at` datetime NOT NULL,
          PRIMARY KEY (`id`)
        ) $charset_collate";

        if ( ! function_exists( 'dbDelta' ) ) {
            require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        }

        dbDelta( $schema );
    }


}