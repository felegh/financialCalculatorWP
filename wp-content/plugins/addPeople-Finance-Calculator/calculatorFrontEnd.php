<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
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
  </body>
</html>
