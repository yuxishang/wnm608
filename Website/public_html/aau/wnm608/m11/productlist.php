<?php


require_once "lib/php/helpers.php";
require_once "parts/templates.php";

?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Product List Page</title>
	<?php include "parts/head.html" ?>
</head>
<body>
	<?php include "parts/header.html" ?>
 

 <section class="flat-row row-product-new style1">
        <div class="mcontainer">
        <div class="title-section margin-bottom-52">
        <h2 class="title col-md-12 "> CHOCOLATE</h2>
        </div>
    <nav class="product-filter ">

  <div class="sort">

    <div class="collection-sort ">
      <label>Filter by:</label>
      <select class="Filter">
        <option value="/">Nut</option>
        <option value="/">Fruity</option>
        <option value="/">Alcohol</option>
        <option value="/">Matcha</option>
        <option value="/">Coffee</option>
        <option value="/">Caramel</option>
        <option value="/">Floral</option>
  
      </select>
    </div>

    <div class="collection-sort ">
      <label>Sort by:</label>
      <select class="Filter">
        <option value="/">Best Selling</option>
        <option value="/">Price Low to High</option>
        <option value="/">Price High to Low</option>
      </select>
    </div>

  </div>

</nav>

        <div class="product-content row gap xs-medium product-list clearfix">

     <?php

      $result = makeQuery(
        makeConn(),
        "
        SELECT *
        FROM `products`
        ORDER BY date_creates DESC
        limit 12
        "
      );

      // print_p($result);

      echo array_reduce($result,
        'productListTemplate');

      ?>
    </div></div></section>
      <?php include "parts/footer.html" ?>
</body>
</html>
