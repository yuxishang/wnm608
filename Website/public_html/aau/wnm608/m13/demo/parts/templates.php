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
          <a href="http://go-roxy.com/aau/wnm608/m12/cartpage.php" class="cart-btn">Add to cart</a>
        </div>
      </div>
    </main>

HTML;
}