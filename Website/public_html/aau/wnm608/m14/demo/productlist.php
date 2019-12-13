<?php


require_once "lib/php/helpers.php";
require_once "parts/templates.php";

?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Product List Page</title>
	<?php include "parts/head.html" ?>

  <script>
  getAPI(1)
  .then(showList)
</script>
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
        <option value="">All</option>
        <option class="list-filter" value="Nut">Nut</option>
        <option class="list-filter" value="Fruity">Fruity</option>
        <option class="list-filter" value="Alcohol">Alcohol</option>
        <option class="list-filter" value="Matcha">Matcha</option>
        <option class="list-filter" value="Coffee">Coffee</option>
        <option class="list-filter" value="Caramel">Caramel</option>
        <option class="list-filter" value="Floral">Floral</option>
  
      </select>
    </div>

    <div class="collection-sort">
      <label>Sort by:</label>
      <select class="Filter list-sort">
        <option value="1">Best Selling</option>
        <option value="2">Price Low to High</option>
        <option value="3">Price High to Low</option>
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
