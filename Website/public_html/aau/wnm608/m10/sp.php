<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Landing page</title>
	<?php include "parts/head.html" ?>
</head>
<body>
	<?php include "parts/header.html" ?>
	 <main class="singleproduct_container">

      <!-- Left Column / Headphones Image -->
      <div class="left-column col-sm-6">
        <img data-image="black" src="images/singleproduct2.jpg" alt="" >
        <img data-image="blue" src="images/singleproduct1.jpg" alt="" >
        <img data-image="red" class="active" src="images/singleproduct.jpg" alt="">
      </div>


      <!-- Right Column -->
      <div class="right-column col-sm-6">

        <!-- Product Description -->
        <div class="single_product-description">
          <span>Chocolate</span>
          <br>
          <h1>Passion Fruit</h1>
          <p>The Passion Fruit Chocolates are incredibly smooth and rich, sweet and tart. They’re just lovely.</p>
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
          <span>$5</span>
          <a href="http://go-roxy.com/aau/wnm608/m10/cartpage.php" class="cart-btn">Add to cart</a>
        </div>
      </div>
    </main>
  </body>
</html>