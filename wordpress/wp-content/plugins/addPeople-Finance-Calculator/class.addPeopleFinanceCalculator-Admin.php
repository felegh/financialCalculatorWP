<?php

class AddPeopleFinanceCalculatorAdmin {

  //public static function admin_hooks (){

  //}

  //public static function adminss_menu(){
    //add_action('admin_menu','menuforFinanCalc');
  //}


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
    array('jquery')
);
wp_localize_script( 'ajax-script', 'ajax_object',
            array( 'ajax_url' => admin_url( 'admin-ajax.php' )) );
    }
    public function my_action(){
      global $wpdb;
      $title = $_POST['dataText'];
      echo "Please add the shortcode [finan_calc] " . $title;
      wp_die();
      return $title;
    }
    public function shortcodeToDisplay(){
      return "Heloooooo";
    }

}
?>
