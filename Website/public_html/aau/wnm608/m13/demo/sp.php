<?php


require_once "lib/php/helpers.php";
require_once "parts/templates.php";

?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>single product page</title>
	<?php include "parts/head.html" ?>
</head>
<body>
	<?php include "parts/header.html" ?>
	 <?php

      $result = makeQuery(
        makeConn(),
        "
        SELECT *
        FROM `products`
        WHERE id = {$_GET['id']}
        "
      );

      //print_p($result);
    echo array_reduce($result,
        'productItemTemplate');

      ?>
      <div class="name"></div>
      <div class="name"></div>
      <div class="name"></div>
      <div class="name"></div>
      <div class="name"></div>
      <div class="name"></div>

        <section class="flat-row row-product-new style1">
        <div class="mcontainer">
        <div class="title-section margin-bottom-52">
        <h2 class="title col-md-12 ">BEST SELLER</h2>
        </div>
        <div class="product-content row gap xs-medium product-list clearfix">

        <?php

      $result = makeQuery(
        makeConn(),
        "
        SELECT *
        FROM `products`
        ORDER BY best DESC
        limit 4
        "
      );

      // print_p($result);

      echo array_reduce($result,
        'productListTemplate');

      ?>

        </div></div>
        </section>
      <div class="ps-section--subscribe">
        <div class="ps-container-fluid">
            <form class="ps-form--subscribe" action="do_action" method="post">
                <h7 class="h7">Sign up for newsletters</h7>
                <p>STAY INFORMED ABOUT THE BEST CHOCOLATE IN THE WORLD</p>
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="Your Email Address">
                </div>
                <div class="form-group">
                    <button class="ps-btn ps-btn--black">REGISTER FOR 20% DISCOUNT</button>
                </div>
            </form>
        </div>
    </div>
     <?php include "parts/footer.html" ?>
  </body>
</html>