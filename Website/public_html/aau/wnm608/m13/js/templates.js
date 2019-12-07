

const productListTemplate = templater (o=>`


	<div class="col-xs-6 col-md-4 col-lg-3"> 
          <div class="product-item">
          <div class="product-thumb clearfix">
          <a href="sp.php?id={$o.id}" class="product-thumb">
          <img src="$o.image_main" alt="image"></a>
          </div>
          <div class="product-info text-center clearfix">
          <span class="product-title">{$o.name}</span>
          <div class="price">
          <ins>
          <span class="amount">{&dollar;$o.price}</span>
          </ins></div></div>
          <div class="add-to-cart text-center">
          <a href="#">ADD TO CART</a></div>
          <a href="#" class="like"><div class="fav">
          <input type="checkbox" id={"$o.id"} class="hidden">
          <label for="{$o.id"}>&hearts;</label></div></a></div></div>`)