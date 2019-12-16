<?php


function productListTemplate($carry,$item) {
return $carry.<<<HTML

<div class="col-xs-6 col-md-4 col-lg-3"> 
          <div class="product-item">
          <div class="product-thumb clearfix">
          <a href="sp.php?id=$item->id" class="product-thumb">
          <img src="$item->image_main" alt="image"></a>
          </div>
          <div class="product-info text-center clearfix">
          <span class="product-title">$item->name</span>
          <div class="price">
          <ins>
          <span class="amount">&dollar;$item->price</span>
          </ins></div></div>
          <div class="add-to-cart text-center">
          <a href="#">ADD TO CART</a></div>
          <a href="#" class="like"><div class="fav">
          <input type="checkbox" id="$item->id" class="hidden">
          <label for="$item->id">&hearts;</label></div></a></div></div>
HTML;
}



function productItemTemplate($carry,$item) {
$otherimages = array_reduce(
	explode(",",$item->other_images),
	function($c,$i){return $c."<img src='$i'>";}
);
return $carry.<<<HTML
<main class="singleproduct_container">

      <!-- Left Column / Headphones Image -->
      <div class="left-column col-sm-6">
        <img data-image="black" src="$item->image_main" alt="" >
        <img data-image="blue" src="$item->image_main" alt="" >
        <img data-image="red" class="active" src="$item->image_main" alt="">
      </div>


      <!-- Right Column -->
      <div class="right-column col-sm-6">

        <!-- Product Description -->
        <div class="single_product-description">
          <span>Chocolate</span>
          <br>
          <h1>$item->name</h1>
          <p>$item->description</p>
        </div>

        <!-- Product Configuration -->
        <div class="product-configuration">

          <!-- Product Color -->
          <div class="product-color">
            <span>Milk or Dark</span>

            <div class="color-choose">
              <div>
                <input data-image="red" type="radio" id="red" name="color" value="red" checked>
                <label for="red"><span></span></label>
              </div>
              <div>
                <input data-image="blue" type="radio" id="blue" name="color" value="blue">
                <label for="blue"><span></span></label>
              </div>
              <div>
                <input data-image="black" type="radio" id="black" name="color" value="black">
                <label for="black"><span></span></label>
              </div>
            </div>

          </div>
              <div class="cable-config col-xs-12 col-sm-6 col-lg-3">
            <span>Size</span>

            <div class="cable-choose col-xs-12 col-sm-6 col-lg-3">
              <button>9-piece</button>
              <button>12-piece</button>
              <button>20-piece</button>
            </div>
          </div>
        </div>


        <!-- Product Pricing -->
        <div class="single_product-price">
          <span>&dollar;$item->price</span>
          <a href="#" class="cart-btn js-add-to-cart" data-id="$item->id">Add to cart</a>
        </div>
      </div>
    </main>

HTML;
}


function cartTemplate($carry,$item) {
return $carry.<<<HTML
        
    <li class="items odd">    
    <div class="infoWrap"> 
    <div class="cartSection">
    <img src="$item->main_images" alt="" class="itemImg" />
    <p class="itemNumber">#Cho-Dark-$item->id</p>
    <h3>$item->name</h3>
        
    <p> <input type="text"  class="qty" placeholder="9"/> x &dollar;$item->price</p>
        
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
    <img src="i$item->main_images" alt="" class="itemImg" />
    <p class="itemNumber">#Cho-Milk-$item->id</p>
    <h3>$item->name</h3>
        
    <p> <input type="text"  class="qty" placeholder="12"/> x &dollar;$item->price</p>
        
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
    <img src="$item->main_images" alt="" class="itemImg" />
    <p class="itemNumber">#Cho-Dark-$item->id</p>
    <h3>$item->name</h3>
        
    <p> <input type="text"  class="qty" placeholder="9"/> x &dollar;$item->price</p>
        
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
    <img src="$item->main_images" alt="" class="itemImg" />
    <p class="itemNumber">#Cho-Milk-$item->id</p>
    <h3>$item->name</h3>
        
    <p> <input type="text"  class="qty" placeholder="12"/> x &dollar;$item->price</p>
        
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
        
         <li class="totalRow"><a href="purchasepage.php" class="btn continue">Checkout</a></li>

       </ul>
    </div>
</div>
      
HTML;
}



