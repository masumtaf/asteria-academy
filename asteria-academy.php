<?php
/**
 * Plugin Name: Asteria Academy
 * Description: A tutorial plugin for WP plugin
 * Plugin URI: https://abdullah.co
 * Author: Abdullah
 * Author URI: https://abdullah.co
 * Version: 1.0.0
 * License: GPL3 or later
 * License URI: https://www.gnu.org/licenses/quick-guide-gplv3.html
 * Text Domain: asteria-academy
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

require_once __DIR__ . '/vendor/autoload.php';

/**
 * The Main Asteria Class
 * 
 * @version 1.0.0
 */
final class Asteria_Academy {

    /**
     * Plugin version 
     * 
     * @var string
     */
    const version = '1.0.0';

    /**
     * Class Constructor 
     */
    private function __construct() {

      $this->define_constant();

      register_activation_hook( __FILE__ , [ $this, 'activated' ] );

      add_action('plugins_loaded', [ $this, 'init_plugin' ] );

    }

    /**
     * Initializes a sigletone instance 
     * 
     * @return \Asteria_Academy
     */
    public static function init() {
        static $instance = false;

        if ( ! $instance ){
            $instance = new self();
        }
        return $instance;
    }

    /**
     * Define the required constant
     * 
     * @return void
     */
    public function define_constant() {

        define( 'AST_AC_VERSION', self::version );
        define( 'AST_AC_FILE', __FILE__ );
        define( 'AST_AC_PATH', __DIR__ );
        define( 'AST_AC_URL', plugins_url( '', AST_AC_FILE) );
        define( 'AST_AC_ASSETS', AST_AC_URL . '/assets');
      
    }

    /**
     * Do stuff when plugin active
     * 
     * @return void
     */
    public function activated(){
        $installer = new Asteria\Academy\Installer ;
        $installer->run();
    }

    public function test($test2){

        if ( ! $test2 ){
            $insalled = $test2;
        }
         else {
            $insalled = 'test';
         }
       

        echo $insalled;
        
    }


    /**
     * Initialize the plugin
     * 
     * @return void
     */
    public function init_plugin(){

        if ( is_admin() ) {
            new Asteria\Academy\Admin();

        } else {
            new Asteria\Academy\Frontend();
        }
    }
}

/**
 * Initializes the main class
 * 
 * @version  1.0.0
 * @return \Asteria_Academy
 */
function Asteria_Academy() {
    return Asteria_Academy::init();
}
Asteria_Academy();

// $value = Asteria_Academy::init();

// print_r($value->test('test me'));