<?php include_once 'helpers/helper.php'; ?>
<?php subview('header.php'); ?>
<style>
  body{
    font-family: 'Montserrat', sans-serif;
    background-image: url('images/bg.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: 100% 100%;
    background-position: center;
  }
  input {
    border :0px !important;
    border-bottom: 2px solid #424242 !important;
    border-radius: 0 !important;
    color :#424242 !important;
    font-weight: bold !important;   
    margin-bottom: 10px;    
  }
  label {
    color : #828282 !important;
    font-size: 19px;
  }  
  .input-group-addon {
    background-color: transparent;
    border-left: 0;
  }
  .card-body {box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);}
  h1 {
    font-size: 40px !important;
    margin-bottom: 20px;  
  }
</style>
<?php if(isset($_SESSION['userId'])) { ?> 
<main>
<?php
  if(isset($_GET['error'])) {
    if($_GET['error'] === 'sqlerror') {
        echo"<script>alert('Database error')</script>";
    } else if($_GET['error'] === 'noret') {
      echo"<script>alert('No return flight available')</script>";
    } else if($_GET['error'] === 'mailerr') {
      echo"<script>alert('Mail error')</script>";
    }
  }
?>
	<div class="container-fluid py-3">
    <div class="row">
        <div class="col-12 col-sm-8 col-md-6 col-lg-5 mx-auto">
          <h1 class="text-center text-light">PAY INVOICE</h1>
            <div id="pay-invoice" class="card">
                <div class="card-body">
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa fa-3x" style="color:navy;"></i>
              <i class="fa fa-cc-amex fa-3x" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard fa-3x" style="color:red;"></i>
              <i class="fa fa-cc-discover fa-3x" style="color:orange;"></i>
               <i class="fa fa-cc-stripe fa-3x" style="color:blue;"></i>
            </div>
            <hr>
            <form action="includes/payment.inc.php" method="post" 
                novalidate="novalidate" class="needs-validation">
  
                <div class="form-group">
                  <label for="cc-number" class="form-label mb-1">Card number</label>
                  <input id="cc-number" name="cc-number" type="tel" 
                    class="form-control shadow-none cc-number identified visa" autocomplete="off" required>
                  <span class="invalid-feedback">Enter a valid 12 to 16 digit card number</span>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                          <label for="cc-exp" class="form-label mb-1">Expiration</label>
                          <input id="cc-exp" name="cc-exp" type="tel" 
                            class="form-control  shadow-none cc-exp" required placeholder="MM / YY" 
                            autocomplete="cc-exp">
                          <span class="invalid-feedback">Enter the expiration date</span>
                        </div>
                    </div>
                    <div class="col-5 p-0">
                        <label for="x_card_code" class="form-label mb-1">CVV</label>
                        <div class="row">
                            <div class="col pr-0">
                              <input id="x_card_code" name="x_card_code" type="password" 
                                class="form-control shadow-none cc-cvc" required autocomplete="off">
                              <span class="invalid-feedback order-last">Enter the 3-digit code on back</span>
                            </div>
                        </div>
                    </div>
                </div>
                <br/>
                <div class='row'>
                <div class='d-grid gap-2 mt-3'>
                    <button id="payment-button" type="submit"  name="pay_but"
                    class="btn btn-lg btn-success btn-block">
                      <i class="fa fa-lock fa-md"></i>&nbsp;
                      <span id="payment-button-amount">Pay </span>
                      <span id="payment-button-sending" style="display:none;">Sending…</span>
                    </button>
                </div>
            </form>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
<script>
$(function () {
  $('[data-toggle="popover"]').popover()
})

$("#payment-button").click(function(e) {
 
    var form = $(this).parents('form');
    
    var cvv = $('#x_card_code').val();
    var regCVV = /^[0-9]{3,4}$/;
    var CardNo = $('#cc-number').val();
    var regCardNo = /^[0-9]{12,16}$/;
    var date = $('#cc-exp').val().split('/');
    var regMonth = /^01|02|03|04|05|06|07|08|09|10|11|12$/;
    var regYear = /^20|21|22|23|24|25|26|27|28|29|30|31$/;
    
    if (form[0].checkValidity() === false) {
      e.preventDefault();
      e.stopPropagation();
    }
    else {
       if (!regCardNo.test(CardNo)) {
        $("#cc-number").addClass('required');
        $("#cc-number").focus();
        alert(" Enter a valid 10 to 16 card number");
        return false;
      }
      else if (!regCVV.test(cvv)) {
        $("#x_card_code").addClass('required');
        $("#x_card_code").focus();
        alert(" Enter a valid CVV");
        return false;
      }
      else if (!regMonth.test(date[0]) && !regMonth.test(date[1]) ) {
        $("#cc_exp").addClass('required');
        $("#cc_exp").focus();
        alert(" Enter a valid exp date");
        return false;
      }
      form.submit();
    }
    form.addClass('was-validated');
});
</script>
</main>
<?php } ?>