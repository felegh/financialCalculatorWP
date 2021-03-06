<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <title></title>
</head>

<body>
  <style>
    input, select {
      width: 10em;
      padding-left: 3.5em;
    }
    /* .highlight {
    position: absolute;
    left: 50%;
    top: 30%;
    transform: translate(-50%, -50%);
} */
  </style>
  <form id="submitForm" action="#">
  <div class="container bg-info text-light">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-6">
            Enter the title: <input type="text" placeholder="Title" id="titleText">
            <div class="row">
              <div class="col-md-3">
            <!-- <label for="myOptions1">Option 1 <input type="text" id="myOptions1" name="myOptions1" placeholder="Your Budget" onkeyup="option1()"></label>
            <label for="myOptions2">Option 2 <input type="text" id="myOptions2" name="myOptions2" placeholder="X Years" onkeyup="option2()"></label>
            <label for="myOptions3">Option 3 <input type="text" id="myOptions3" name="myOptions3" placeholder="Rate" onkeyup="option3()"></label> -->
            </div>
            <div class="col-md-3 offset-md-1">
              <!-- <label for="myOptions1">Option 1 <select name="" id=""></select></label>
              <label for="myOptions2">Option 2 <select name="" id=""></select></label>
              <label for="myOptions3">Option 3
              <select name="" id=""></select></label> -->
            </div>
          </div>
                    </div>
        </div>
      </div>
    </div>
    <div class="row">
      <input type="submit" value="Submit" id="submitChanges">
    </div>
  </div>
</form>
  <div class="container highlight">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-6 bg-primary text-light">
            <h2 class="text-center">What you want</h2>
            <div class="row">
              <div class="col-md-6">
                <label for="yourbudget" id="option1">Your Budget</label>
              </div>
              <div class="col-md-6"><input type="number" min="1000" max="4000" step="500" name="yourbudget" value="1000" id="yourBudget" onchange="financeCalculator()">
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label for="overyears" id="option2">Over how many years?</label>
              </div>
              <div class="col-md-6">
                <input type="number" name="overyears" min="1" max="4" step="1" value="1" id="overYears" onchange="financeCalculator()">
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <p id="option3">Rate:</p>
              </div>
              <div class="col-md-6">
                <select id="rate" onkeyup="financeCalculator()">
                  <option value="7">7</option>
                  <option value="10">10</option>
                  <option value="14">14</option>
                  <option value="18">18</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-6 bg-secondary text-light">
            <h2 class="text-center">What we can give you</h2>
            <div class="row">
              <div class="col-md-6">
                <p>Total Budget:</p>
              </div>
              <div class="col-md-6">
                <p id="totalbudget">7000</p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <p>Cost of Credit:</p>
              </div>
              <div class="col-md-6">
                <p id="totalcreditcost">6000</p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <p>Rate:</p>
              </div>
              <div class="col-md-6">
                <p id="rateResult">7</p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <p>Monthly Payments:</p>
              </div>
              <div class="col-md-6">
                <p id="monthlyPayments">583.33</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
  function option1() {
    var selectedOption1 = document.getElementById('myOptions1').value;
    document.getElementById('option1').innerHTML = selectedOption1;
  }
  function option2() {
    var selectedOption2 = document.getElementById('myOptions2').value;
    document.getElementById('option2').innerHTML = selectedOption2;
  }
  function option3() {
    var selectedOption3 = document.getElementById('myOptions3').value;
    document.getElementById('option3').innerHTML = selectedOption3;
  }
  function financeCalculator() {
    var yourBudget = document.getElementById('yourBudget').value;
    var overYears = document.getElementById('overYears').value;
    var rate = document.getElementById('rate').value;
    var month = overYears * 12;
    calculate(yourBudget, overYears, rate, month);
  }

  function calculate(yourBudget, overYears, rate, month) {
var interest_rate;
    if(overYears == 2){
      interest_rate = 1.4;
    }
    else if (overYears == 3) {
      interest_rate = 2.4;
    }
    else if (overYears == 4) {
      interest_rate = 3.4;
    }
    else {
      interest_rate = 1;
    }
    var totalBudget = yourBudget * rate * interest_rate;
    var costOfCredit = totalBudget - yourBudget;
    var monthlyPayments = Math.round((totalBudget / month) * 100) / 100;

    document.getElementById('totalbudget').innerHTML = totalBudget;
    document.getElementById('totalcreditcost').innerHTML = costOfCredit;
    document.getElementById('rateResult').innerHTML = rate;
    document.getElementById('monthlyPayments').innerHTML = monthlyPayments;
  }

  </script>
  <!-- <script>
  function totalBudget() {
    var yourBudget = document.getElementById('yourbudget').value;
    var borrowAmount = Math.round(yourBudget * 1.2);
    return document.getElementById('totalcreditcost').innerHTML = borrowAmount;
  }

  function overYears() {
    var overXYearsAmount = totalBudget() * 2;
    document.getElementById('totalcreditcost').innerHTML = overXYearsAmount;
  }
  </script> -->

</body>

</html>
