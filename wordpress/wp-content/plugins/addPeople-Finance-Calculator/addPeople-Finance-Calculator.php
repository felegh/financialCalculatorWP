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
require_once(AddPeopleFinaCalcDir . 'class.addPeopleFinanceCalculator-Admin.php');

class AddPeopleFinanceCalculator {


  function activate(){
    //AddPeopleFinanceCalculatorAdmin::admin_menu();
    //echo "Plgu";
  }

  function deactivate(){

  }

  function uninstall(){

  }
}

  $addFinanCalc = new AddPeopleFinanceCalculator();
$addFinan = new AddPeopleFinanceCalculatorAdmin();
//register_activation_hook(__FILE__, array( $addFinanCalc, 'activate'));
add_action("admin_init", array($addFinanCalc, 'activate'));
add_action('admin_menu', array($addFinan, 'menuforFinanCalc'));
add_action( 'admin_enqueue_scripts', array($addFinan, 'addingAjax') );
add_action('wp_ajax_my_action', array($addFinan, 'my_action'));
add_shortcode( 'finan_calc', array($addFinan, 'shortcodeToDisplay') )
?>
