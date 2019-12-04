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
      <select class="list-filter Filter">
        <option value="nut">Nut</option>
        <option value="fruity">Fruity</option>
        <option value="alcohol">Alcohol</option>
        <option value="matcha">Matcha</option>
        <option value="coffee">Coffee</option>
        <option value="caramel">Caramel</option>
        <option value="floral">Floral</option>
  
      </select>
    </div>

    <div class="collection-sort ">
      <label>Sort by:</label>
      <select class=" list-sort Filter">
        <option value="/">Best Selling</option>
        <option value="/">Price Low to High</option>
        <option value="/">Price High to Low</option>
      </select>
    </div>

</div>
</nav>
<div class="collection-sort">
<form id="list-search-form">
      <label>
        <input type="search" class="list-search form-input" placeholder="Search for Product">
      </label>
    </form>
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
