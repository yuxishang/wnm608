<?php


require_once "lib/php/helpers.php";
require_once "parts/templates.php";

?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home</title>
	<?php include "parts/head.html" ?>
</head>
<body>
	<?php include "parts/header.html" ?>
  <?php include "parts/slidershow.html" ?>

        <section class="flat-row row-product-new style1">
        <div class="mcontainer">
        <div class="title-section margin-bottom-52">
        <h2 class="title col-md-12 "> New Product</h2>
        </div>
        <div class="product-content row gap xs-medium product-list clearfix">

        <?php

      $result = makeQuery(
        makeConn(),
        "
        SELECT *
        FROM `products`
        ORDER BY id DESC
        limit 8
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
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed fermentum nibh, vel aliquet massa. Etiam in magna id risus lacinia luctus eget eu est.</p>
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