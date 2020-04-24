<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cartpage</title>
    <meta name="viewport" content="width=device-width">
	<?php include "parts/head.html" ?>
</head>
<body>
	<?php include "parts/header.html" ?>

<div class="wrap cf">
  <div class="heading cf">
    <h1>My Cart</h1>
  </div>
  <div class="cart">

    <ul class="cartWrap">
        
    <li class="items odd">    
    <div class="infoWrap"> 
    <div class="cartSection">
    <img src="images/cappuccino_main.jpg" alt="" class="itemImg" />
    <p class="itemNumber">#Cho-Dark-008</p>
    <h3>Cappuccino</h3>
        
    <p> <input type="text"  class="qty" placeholder="9"/> x $5.00</p>
        
    <p class="stockStatus"> In Stock</p>
    </div>  
    <div class="prodTotal cartSection">
    <p>$45.00</p>
    </div>
    <div class="cartSection removeWrap">
    <a href="#" class="remove">x</a>
    </div>
    </div>
    </li>


    <li class="items even">
    <div class="infoWrap"> 
    <div class="cartSection">
    <img src="images/champagne_main.jpg" alt="" class="itemImg" />
    <p class="itemNumber">#Cho-Milk-007</p>
    <h3>Dark Champagne</h3>
        
    <p> <input type="text"  class="qty" placeholder="12"/> x $5.00</p>
        
    <p class="stockStatus"> In Stock</p>
    </div>  
        
    <div class="prodTotal cartSection">
    <p>$60.00</p>
    </div>
    
    <div class="cartSection removeWrap">
    <a href="#" class="remove">x</a>
    </div>
    </div>
    </li>

    <li class="items odd">    
    <div class="infoWrap"> 
    <div class="cartSection">
    <img src="images/hazelnut_main.jpg" alt="" class="itemImg" />
    <p class="itemNumber">#Cho-Dark-013</p>
    <h3>Hazelnut</h3>
        
    <p> <input type="text"  class="qty" placeholder="9"/> x $5.00</p>
        
    <p class="stockStatus"> In Stock</p>
    </div>  
    <div class="prodTotal cartSection">
    <p>$45.00</p>
    </div>
    <div class="cartSection removeWrap">
    <a href="#" class="remove">x</a>
    </div>
    </div>
    </li>

    <li class="items even">
    <div class="infoWrap"> 
    <div class="cartSection">
    <img src="images/Rose_main.jpg" alt="" class="itemImg" />
    <p class="itemNumber">#Cho-Milk-005</p>
    <h3>Dark Rose</h3>
        
    <p> <input type="text"  class="qty" placeholder="12"/> x $5.00</p>
        
    <p class="stockStatus"> In Stock</p>
    </div>  
        
    <div class="prodTotal cartSection">
    <p>$60.00</p>
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
      <li class="totalRow"><span class="label">Subtotal</span><span class="value">$150.00</span></li>
      
          <li class="totalRow"><span class="label">Shipping</span><span class="value">$5.00</span></li>
      
            <li class="totalRow"><span class="label">Tax</span><span class="value">$4.00</span></li>
            <li class="totalRow final"><span class="label">Total</span><span class="value">$159.00</span></li>
        
         <li class="totalRow"><a href="http://go-roxy.com/aau/wnm608/m13/purchasepage.php" class="btn continue">Checkout</a></li>

       </ul>
    </div>
</div>
  <?php include "parts/footer.html" ?>
</body>
</html>