<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Landing page</title>
	<?php include "parts/head.html" ?>
</head>

  
   <div class="css-slider-wrapper">
      <input type="radio" name="slider" class="slide-radio1" checked id="slider_1">
      <input type="radio" name="slider" class="slide-radio2" id="slider_2">
      <input type="radio" name="slider" class="slide-radio3" id="slider_3">
      <input type="radio" name="slider" class="slide-radio4" id="slider_4">

      <!-- Slider Pagination -->
      <div class="slider-pagination">
        <label for="slider_1" class="page1"></label>
        <label for="slider_2" class="page2"></label>
        <label for="slider_3" class="page3"></label>
        <label for="slider_4" class="page4"></label>
      </div>

      <!-- Slider #1 -->
      <div class="lslider lslide-1">
        <img src="images/slide1.jpg" alt="">
        <div class="lslider-content">
          <h4>Seasonal Flavors</h4>
          <h2>Coconut Lime</h2>
          <a href="http://go-roxy.com/aau/wnm608/m13/demo/sp.php?id=1">
          <button type="button" class="buy-now-btn" name="button">$5</button></a>
          <br>
          <br>
          <a href="http://go-roxy.com/aau/wnm608/m13/demo/main.php">
          <button type="button" class="Enter-now-btn" name="button">Enter</button></a>
        </div>
        <div class="number-pagination">
          <span>1</span>
        </div>
      </div>

      <!-- Slider #2 -->
      <div class="lslider lslide-2">
        <img src="images/slide2.jpg" alt="">
        <div class="lslider-content">
          <h4>New Product</h4>
          <h2>Hazelnut</h2>
          <a href="http://go-roxy.com/aau/wnm608/m13/demo/sp.php?id=13">
          <button type="button" class="buy-now-btn" name="button">$4</button></a>
          <br>
          <br>
          <a href="http://go-roxy.com/aau/wnm608/m13/demo/main.php">
          <button type="button" class="Enter-now-btn" name="button">Enter</button></a>
        </div>
        <div class="number-pagination">
          <span>2</span>
        </div>
      </div>

      <!-- Slider #3 -->
      <div class="lslider lslide-3">
        <img src="images/slide3.jpg" alt="">
        <div class="lslider-content">
          <h4>Best Seller</h4>
          <h2>Lavender</h2>
         <a href="http://go-roxy.com/aau/wnm608/m13/demo/sp.php?id=2">
          <button type="button" class="buy-now-btn" name="button">$5</button></a>
          <br>
          <br>
          <a href="http://go-roxy.com/aau/wnm608/m13/demo/main.php">
          <button type="button" class="Enter-now-btn" name="button">Enter</button></a>
        <div class="number-pagination">
          <span>3</span>
        </div>
      </div>

      <!-- Slider #4 -->
      <div class="lslider lslide-4">
        <img src="images/slide4.jpg" alt="">
        <div class="lslider-content">
          <h4>Fruit</h4>
          <h2>Strawberries</h2>
        <a href="http://go-roxy.com/aau/wnm608/m12/demo/sp.php?id=10">
          <button type="button" class="buy-now-btn" name="button">$5</button></a>
          <br>
          <br>
           <a href="http://go-roxy.com/aau/wnm608/m12/demo/main.php">
          <button type="button" class="Enter-now-btn" name="button">Enter</button></a>
        <div class="number-pagination">
          <span>4</span>
        </div>
      </div>
    </div>
  </body>
