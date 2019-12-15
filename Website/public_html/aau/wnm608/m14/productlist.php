<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Product List Page</title>
  <meta name="viewport" content="width=device-width">
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

<div class="container">
    <form id="list-search-form">
      <label>
        <input type="search" class="list-search form-input" placeholder="Search for Product">
      </label>
    </form>
  </div>
  <div class="sortt">

    <div class="collection-sort">
      <label>Filter by:</label>
      <select class="Filter list-filter">
        <option data-value="">All</option>
        <option class="list-filter" data-value="Nut">Nut</option>
        <option class="list-filter" data-value="Fruity">Fruity</option>
        <option class="list-filter" data-value="Alcohol">Alcohol</option>
        <option class="list-filter" data-value="Matcha">Matcha</option>
        <option class="list-filter" data-value="Coffee">Coffee</option>
        <option class="list-filter" data-value="Caramel">Caramel</option>
        <option class="list-filter" data-value="Floral">Floral</option>
      </select>
    </div>

    <div class="collection-sort">
      <label>Sort by:</label>
      <select class="list-sort sort">
        <option value="1">Best Selling</option>
        <option value="2">Price Low to High</option>
        <option value="3">Price High to Low</option>
      </select>
    </div>

  </div>

</nav>



        <div class="product-list product-content row gap xs-medium clearfix">
</div>

<div class="pagecenter">
  <div class="pagination">
  <a href="#">&laquo;</a>
  <a href="#" class="active">1</a>
  <a href="#">2</a>
  <a href="#">3</a>
  <a href="#">4</a>
  <a href="#">5</a>
  <a href="#">6</a>
  <a href="#">&raquo;</a>
  </div>
</div>
<br>
<br>


      <?php include "parts/footer.html" ?>
</body>
</html>
