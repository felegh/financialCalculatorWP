<?php
define('AddPeopleFinaCalcDirectory', plugin_dir_path( __FILE__ ));
require_once(AddPeopleFinaCalcDirectory . 'class.AddPeopleFinanCalcAjax.php');
class AddPeopleFinanceCalculatorAdmin {
  public $title;
  public static function menuforFinanCalc() {
    $page_title = 'Finance Calculator';
    $menu_title = 'Addpeople Finance Calculator';
    $capability = 'manage_options'; //make it show for only Admin user
    $menu_slug = 'addpeople-finance-calculator';
    //$function = 'self::display_configuration_page'; //function that displays what appears on the menu page
    $icon_url = 'dashicons-media-code';
    add_menu_page($page_title, $menu_title, $capability, $menu_slug, $function = 'AddPeopleFinanceCalculatorAdmin::display_configuration_page', $icon_url);
  }

  public static function display_configuration_page() {
    include( AddPeopleFinaCalcDir . '/view/settingPage.php' );
    }

    public static function create(){
      if($_POST['formSubmit']){
        echo "Hello";
      }
    }
    public function addingAjax(){
    wp_enqueue_script( 'ajax-script',
    plugins_url( '/view/ajaxJquery.js', __FILE__ ),
    array('jquery'));
    wp_localize_script( 'ajax-script', 'ajax_object',
            array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'nonce' => wp_create_nonce('_wpnonce')) );
    }

    public static function my_action(){
      global $wpdb;
    $title = $_POST['dataText'];
      $table_name = $wpdb->prefix . 'finanCalc';
      $wpdb->insert(
              $table_name,
              array('name' => $title)
      );
      echo self::shortcodeToDisplay($title);
      wp_die();
    }
    public static function shortcodeToDisplay($title){
      //echo '<div class="timezone">' . $title . '</div>';
      return $title;
    }
    public static function timezone(){
      global $wpdb;
      $table_name = $wpdb->prefix . 'finanCalc';
      $myrows = $wpdb->get_results("SELECT name FROM $table_name");
      //$result = json_decode($myrows, true);
      //var_dump($myrows);
      $results = json_decode(json_encode($myrows), True);
      //var_dump($results);
       foreach ($results as $value) {
         $results[] = $value['name'];
         //var_dump($results);
        echo '<div class="timezone">' . $value['name'] . '</div>';
       }
}

}
?>
