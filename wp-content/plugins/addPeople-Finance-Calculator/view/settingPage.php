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
  </style>
<form action="#" name="submitForm" id="submitForm">
  <h3> Calculator Plugin Form</h3>
  <div class="form-group">
    <label style="width: 43%">Enter the title you would like to appear on the frontend  <input type="text" id="titleText" name= "dataText" class="form-control" placeholder="Title"></label>
  </div>
  <div class="form-group">
    <label style="width: 21.5%">What's the Minimum Budget? <input type="number" class="form-control" id="minBudget" name="minimumBudget" placeholder="Minimum Budget" onchange="updateBudget()"></label>
    <label style="width: 21.5%">What's the Maximum Budget? <input type="number" class="form-control" id="maxBudget" name="maximumBudget" placeholder="Maximum Budget" onchange="updateBudget()"></label>
  </div>
  <div class="form-group">
    <label>Please enter the rates you want to calculate by:
      <small class="form-text text-muted">If you only have one rate just insert it into the minimum box</small></label></br>
    <label>What's the Minimum Rate? <input type="number" class="form-control" name="minimumRate" id="minimumRate" placeholder="Minimum Rate" onchange="updateRate()"></label>
    <label>What's the Medium Rate? <input type="number" class="form-control" name="mediumRate" id="mediumRate" placeholder="Medium Rate" onchange="updateRate()"></label>
    <label>What's the Maximum Rate? <input type="number" class="form-control" name="maximumRate" id="maximumRate" placeholder="Maximum Rate" onchange="updateRate()"></label>
  </div>
  <div class="form-group">
      <label style="width: 13%">What is the maximum year you will provide the finance for? <input type="number" class="form-control" name="year" placeholder="Year" onchange="updateYear()" id="yearly"></label>
  </div>
  <input type="submit" value="Submit" id="submitChanges">
</form>
<div class="financeCalculator" id="financeCalculator">
    <div class="financeHeading">
        <h2>Calculate Your Finance!</h2>
    </div>
    <div class="theBudget">
    <label for="minBudget" style="margin-right: 1em;">How much do you need to borrow?</label><input type="range" name="minBudget" min="100" max="200" class="chooseBudget">
    <p class="yearsResult">200</p>
</div>
<div class="theRate">
    <label for="chooseRate">What's your credit score like?</label>
    <select name="chooseRate" class="chooseRate">
        <option value="1">Poor</option>
        <option value="2">Okay</option>
        <option value="3">Great</option>
    </select>
</div>
<div class="theYears">
    <label for="chooseYears" style="
    margin-right: 1em">Over how many years would you repay us?</label><input name="chooseYears" type="range" min="1" max="4" class="chooseYears">
<p id="yearsResult" class="financeNumbers">4</p>
    </div>
    <div class="totalRepayments">
      <h5>Monthly repayments:</h5>
      <h4>£0.00</h4>
    </div>
</div>
  <script>

  function updateBudget(){
    var maximumBudget = document.getElementById('maxBudget').value;
    var minimumBudget = document.getElementById('minBudget').value;
    document.getElementById('yourBudget').setAttribute('min', minimumBudget);
    document.getElementById('yourBudget').setAttribute('max', maximumBudget);
  }
  function updateRate(){
    var minimum = document.getElementById('minimumRate').value;
    var medium = document.getElementById('mediumRate').value;
    var maximum = document.getElementById('maximumRate').value;
    document.getElementById('rate').options[0].value = minimum;
    document.getElementById('rate').options[0].innerHTML = minimum;
    document.getElementById('rate').options[1].value = medium;
    document.getElementById('rate').options[1].innerHTML = medium;
    document.getElementById('rate').options[2].value = maximum;
    document.getElementById('rate').options[2].innerHTML = maximum;
  }
  function updateYear(){
    var maxYear = document.getElementById('yearly').value;
    document.getElementById('overYears').setAttribute('max', maxYear);
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

</body>

</html>
