<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">    
    <title>Cart page</title>
    <meta name="viewport" content="width=device-width">
	<?php include "parts/head.html" ?>

    <script src="js/cart.js"></script>
</head>
<body>
	<?php include "parts/header.html" ?>
    <div class="wrap cf">
    <div class="heading cf">
    <h1>My Cart</h1>
    </div>
    <div class="cart cart-list">
    </div>
    <div class="special"><div class="specialContent">Free gift with purchase!, gift wrap, etc!!</div></div>
    <div class="promoCode"><label for="promo">Have A Promo Code?</label><input type="text" name="promo" placholder="Enter Code" />
    <a href="#" class="btn"></a></div>
    <div class="subtotal cf cart-totals">
    </div>
    </div>
    <?php include "parts/footer.html" ?>
    </body>
    </html>