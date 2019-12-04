<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Landing page</title>
	<?php include "parts/head.html" ?>
</head>
<body>
	<?php include "parts/header.html" ?>

	<div class="wrap cf">
  <div class="heading cf">
    <h1>My Cart</h1>
    <a href="http://go-roxy.com/aau/wnm608/m07/productlist.html" class="continue">Continue Shopping</a>
  </div>
  <div class="cart">

    <ul class="cartWrap">
      <li class="items odd">
        
    <div class="infoWrap"> 
        <div class="cartSection">
          <p class="itemNumber">#Cho-Dark-010</p>
          <h3>Passion Fruit</h3>
        
           <p> <input type="text"  class="qty" placeholder="3"/> x $5.00</p>
        
          <p class="stockStatus"> In Stock</p>
        </div>  
    
        
        <div class="prodTotal cartSection">
          <p>$15.00</p>
        </div>
              <div class="cartSection removeWrap">
           <a href="#" class="remove">x</a>
        </div>
      </div>
      </li>
      <li class="items even">
        
       <div class="infoWrap"> 
        <div class="cartSection">
          <p class="itemNumber">#Cho-Milk-002</p>
          <h3>Dark Pistachio</h3>
        
           <p> <input type="text"  class="qty" placeholder="3"/> x $5.00</p>
        
          <p class="stockStatus"> In Stock</p>
        </div>  
        
        <div class="prodTotal cartSection">
          <p>$15.00</p>
        </div>
    
            <div class="cartSection removeWrap">
           <a href="#" class="remove">x</a>
        </div>
         </div>
         <div class="special"><div class="specialContent">Free gift with purchase!, gift wrap, etc!!</div></div>
      </li>
      
      
      <!--<li class="items even">Item 2</li>-->
 
    </ul>
  </div>
  
  <div class="promoCode"><label for="promo">Have A Promo Code?</label><input type="text" name="promo" placholder="Enter Code" />
  <a href="#" class="btn"></a></div>
  
  <div class="subtotal cf">
    <ul>
      <li class="totalRow"><span class="label">Subtotal</span><span class="value">$35.00</span></li>
      
          <li class="totalRow"><span class="label">Shipping</span><span class="value">$5.00</span></li>
      
            <li class="totalRow"><span class="label">Tax</span><span class="value">$4.00</span></li>
            <li class="totalRow final"><span class="label">Total</span><span class="value">$44.00</span></li>
      <li class="totalRow"><a href="http://go-roxy.com/aau/wnm608/m07/purchasepage.html" class="btn checkout">Checkout</a></li>
    </ul>
  </div>
</div>