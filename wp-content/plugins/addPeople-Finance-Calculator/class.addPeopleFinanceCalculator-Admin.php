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
    $minimumRate = $_POST['minimumRate'];
    $mediumRate = $_POST['mediumRate'];
    $maximumRate = $_POST['maximumRate'];
    $year = $_POST['year'];
    $minimumBudget = $_POST['minimumBudget'];
    $maximumBudget = $_POST['maximumBudget'];
      $table_name = $wpdb->prefix . 'finanCalc';
      $wpdb->insert(
              $table_name,
              array('name' => $title,
                    'minimumRate' => $minimumRate,
                    'mediumRate' => $mediumRate,
                    'maximumRate' => $maximumRate,
                    'minimumBudget' => $minimumBudget,
                    'maximumBudget' => $maximumBudget,
                    'year' => $year)
      );
      print_r( $wpdb->queries );
      echo self::shortcodeToDisplay($title);
      wp_die();
    }

    public static function shortcodeToDisplay($title){
      return $title;
    }

    public static function CalcDisplay(){
      global $wpdb;
      $table_name = $wpdb->prefix . 'finanCalc';
      $myrows = $wpdb->get_results("SELECT * FROM $table_name");
      $results = json_decode(json_encode($myrows), True);
        foreach ($results as $value) {
          $results[] = $value['name'];
          echo '<div class="timezone">' . $value['name'] . '</div>';
      }
       return var_dump($results);
     }
}
?>
