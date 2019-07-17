<?php
/**
 * @package AddPeopleFinanceCalculator
 */
/*
/**
 * Plugin Name: AddPeople Finance Calculator
 * Plugin URI: http://www.mywebsite.com/my-first-plugin
 * Description: Calculator Plugin bla bla bla bla
 * Version: 1.0
 * Author: Your Name
 * Author URI: http://www.mywebsite.com
 */
defined('ABSPATH') or die('Access Denied');
define('AddPeopleFinaCalcDir', plugin_dir_path( __FILE__ ));
require_once(AddPeopleFinaCalcDir . 'class.AddPeopleFinanCalcAjax.php');
require_once(AddPeopleFinaCalcDir . 'class.addPeopleFinanceCalculator-Admin.php');
require_once(AddPeopleFinaCalcDir . 'class.AddPeopleFinanCalcAjax.php');

class AddPeopleFinanceCalculator {


  function activate(){
    global $wpdb;
    $table_name = $wpdb->prefix . 'financalc';
    $charset_collate = $wpdb->get_charset_collate();
    if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name){
      $sql = "CREATE TABLE $table_name(
      id mediumint(9) NOT NULL AUTO_INCREMENT,
      name varchar(200),
      minimumRate varchar(10),
      mediumRate varchar(10),
      maximumRate varchar(10),
      minimumBudget varchar(15),
      maximumBudget varchar(15),
      year INT,
      PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    	  dbDelta( $sql );
      }
}
}
$addFinanCalc = new AddPeopleFinanceCalculator();
$addFinan = new AddPeopleFinanceCalculatorAdmin();
register_activation_hook(__FILE__, array( $addFinanCalc, 'activate'));
add_action("admin_init", array($addFinanCalc, 'activate'));
add_action('admin_menu', array($addFinan, 'menuforFinanCalc'));
add_action( 'admin_enqueue_scripts', array($addFinan, 'addingAjax') );
add_action('wp_ajax_my_action', array($addFinan, 'my_action'));
add_shortcode( 'finan_calc', array($addFinan, 'CalcDisplay'));
?>
