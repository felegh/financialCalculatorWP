<?php
define('AddPeopleFinaCalcDirectory', plugin_dir_path( __FILE__ ));
//require_once(AddPeopleFinaCalcDirectory . 'class.AddPeopleFinanCalcAjax.php');
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

    public static function custom_css(){
      echo "<style>
      input.chooseBudget::-webkit-slider-thumb {
      -webkit-appearance: none;
      width: 25px;
      height: 25px;
      background: #fff;
      border-radius: 1em;
      border: 1px solid black;
      cursor: grab;
      }
      input.chooseYears::-webkit-slider-thumb {
      -webkit-appearance: none;
      width: 25px;
      height: 25px;
      background: #fff;
      border-radius: 1em;
      border: 1px solid black;
      cursor: grab;
      }
      #financeCalculator input {
      -webkit-backface-visibility: hidden;
      border:none;
      background: #1245a8;
      box-sizing: border-box;
      outline: none;
      -webkit-appearance: none;
      outline-offset: 0;
      border-radius: 1em;
      padding: 2px;
      }
      .financeNumbers {
      color: green;
      font-size: 2em;
      font-weight: bold;
      margin: 0;
      }
      select.chooseRate {
      background: #fff;
      color: #1245a8;
      border: 1px solid #1245a8;
      font-weight: bold;
      border-radius: 26px;
      }
            </style>";
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
      $table_name = $wpdb->prefix . 'financalc';
      $wpdb->query("TRUNCATE TABLE $table_name");
    $title = $_POST['dataText'];
    $minimumRate = $_POST['minimumRate'];
    $mediumRate = $_POST['mediumRate'];
    $maximumRate = $_POST['maximumRate'];
    $year = $_POST['year'];
    $minimumBudget = $_POST['minimumBudget'];
    $maximumBudget = $_POST['maximumBudget'];
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
      //echo $_POST['dataText'];
      echo self::shortcodeToDisplay($title);
      wp_die();
    }

    public static function shortcodeToDisplay($title){
      return $title;
    }

    public static function CalcDisplay(){
      global $wpdb;
      $table_name = $wpdb->prefix . 'financalc';
      $myrows = $wpdb->get_results("SELECT * FROM $table_name");
      $results = json_decode(json_encode($myrows), True);
      $allData = array();
        foreach ($results as $value) {
          $allData = array("title" => $value['name'],
          "minimumRate" => $value['minimumRate'],
          "mediumRate" => $value['mediumRate'],
          "maximumRate" => $value['maximumRate'],
          "minimumBudget" => $value['minimumBudget'],
          "maximumBudget" => $value['maximumBudget'],
          "year" => $value['year']);
          //echo '<div class="timezone">' . $value['name'] . '</div>';
      }
      echo "<div class='financeCalculator' id='financeCalculator'>
          <div class='financeHeading'>
              <h2>" . $allData['title'] . "</h2>
          </div>
          <div class='theBudget'>
          <label for='minBudget' style='margin-right: 1em;''>How much do you need to borrow?</label><input type='range' name='minBudget' min='" . $allData['minimumBudget'] . "' max='" . $allData['maximumBudget'] . "' class='chooseBudget'>
          <p class='yearsResult'>200</p>
      </div>
      <div class='theRate'>
          <label for='chooseRate'>What's your credit score like?</label>
          <select name='chooseRate' class='chooseRate'>
              <option value='" . $allData['minimumRate'] . "'>Poor</option>
              <option value='" . $allData['mediumRate'] . "'>Okay</option>
              <option value='" . $allData['maximumRate'] . "'>Great</option>
          </select>
      </div>
      <div class='theYears'>
          <label for='chooseYears' style='margin-right: 1em'>Over how many years would you repay us?</label>
          <input name='chooseYears' type='range' min='1' max='" . $allData['year'] . "' class='chooseYears'>
      <p id='yearsResult' class='financeNumbers'>4</p>
          </div>
          <div class='totalRepayments'>
            <h5>Monthly repayments:</h5>
            <h4>£0.00</h4>
          </div>
      </div>";
       //return var_dump($results);
     }
}
?>
