<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Purchase Page</title>
    <meta name="viewport" content="width=device-width">
	<?php include "parts/head.html" ?>
</head>
<body>
	<?php include "parts/header.html" ?>
 <div class="cart">
<div class="pwrapper">
    <div class="pcontainer">
        <form action="">
            <h6>
                <i class="fas fa-shipping-fast"></i> Shipping Details
            </h6>
            <div class="name">
                <div>
                    <label for="f-name">First</label>
                    <input type="text" name="f-name" placeholder="">
                </div>
                <div>
                    <label for="l-name">Last</label>
                    <input type="text" name="l-name">
                </div>
            </div>
            <div class="street">
                <label for="name">Street</label>
                <input type="text" name="address">
            </div>
            <div class="address-info">
                <div>
                    <label for="city">City</label>
                    <input type="text" name="city">
                </div>
                <div>
                    <label for="state">State</label>
                    <input type="text" name="state">
                </div>
                <div>
                    <label for="zip">Zip</label>
                    <input type="text" name="zip">
                </div>
            </div>
            <h6>
                <i class="far fa-credit-card"></i> Payment
            </h6>
            <div class="cc-num">
                <label for="card-num">Credit Card No.</label>
                <input type="text" name="card-num">
            </div>
            <div class="cc-info">
                <div>
                    <label for="card-num">Exp</label>
                    <input type="text" name="expire">
                </div>
                <div>
                    <label for="card-num">CCV</label>
                    <input type="text" name="security">
                </div>
            </div>
                 <div class="cc-num">
               <a href="http://go-roxy.com/aau/wnm608/m12/cartpage.php" class="p-btn" >Back To Cart</a>
                <a href="http://go-roxy.com/aau/wnm608/m12/confirmation.php" class="p-btn" >Subtmit</a></div>
  </div>
            </div>
        </form>
    </div>
</div>
</div>
  <?php include "parts/footer.html" ?>
</body>
</html>
