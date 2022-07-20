<?php
include('includes/config.php');

$page_title = "Home Page";
$meta_description = "Calculator";
$meta_keywords = "Calculator";

include('includes/header.php');
include('includes/navbar.php');
?>

<!-- Javascript-->
<script src="scripts.js"></script>


<center>
<div class="col-md-12 paymentCalc">

    <div class="col-md-6">
  
      <form id="loanCalc" action="" method="get" class="">
        <div class="col-md-12">
          <h2>Car Loan Payment </h2>
          <br>
          <div class="form-group">
            <label for="vehiclePrice">Vehicle Price</label>
            <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" id="vehiclePrice" placeholder="ex: 799999" >
          </div>
        </div>
          <br>
        <div class="col-md-12">
          <div class="form-group">
            <label for="downPayment">Down Payment</label>
            <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" id="downPayment" placeholder="ex: 116800" required >
          </div>
        </div>
          <br>
        <div class="col-md-12">
          <div class="form-group">
            <label for="tradeValue">Trade In Value</label>
            <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" id="tradeValue" placeholder="ex: 196000" >
          </div>
        </div>
           <br>
        <div class="col-md-12">
          <div class="form-group">
            <label for="intRate">Interest Rate</label>
            <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" id="intRate" placeholder="ex: 3.25" required>
          </div>
        </div>
            <br>
        <div class="col-md-12">
          <div class="form-group">
            <label for="loanTerm">Loan Term</label>
            <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" id="loanTerm" placeholder="ex: 36 Months" required>
          </div>
        </div>
          <br>
        <div class="clearfix"></div>
        <div class="col-md-12">
          <a href="#" class="calcBtn" onclick="calculatePayments()" id="calculate" value="Calulate">Calculate</a>
        </div>
      </form>
    </div>
    <div class="col-md-6">
      <div id="paymentResults">
  
      </div>
    </div>
  </div>
  </center>


<?php
include('includes/footer.php');
?>