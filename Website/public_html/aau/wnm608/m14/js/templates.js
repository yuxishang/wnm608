

const productListTemplate = templater(o=>`


	<div class="col-xs-6 col-md-4 col-lg-3"> 
          <div class="product-item">
          <div class="product-thumb clearfix">
          <a href="sp.php?id=${o.id}" class="product-thumb">
          <img src="${o.image_main}" alt="image"></a>
          </div>
          <div class="product-info text-center clearfix">
          <span class="product-title">${o.name}</span>
          <div class="price">
          <ins>
          <span class="amount">&dollar;${o.price}</span>
          </ins></div></div>
         </div></div>`
          );


const cartListItemTemplate = templater(o => `

     <li class="items odd">    
     <div class="infoWrap"> 
     <div class="cartSection">
     <a href="sp.php?id=${o.id}">
     <img src="${o.image_main}" class="itemImg"/ ></a>
     <p class="itemNumber">#Cho-Dark-${o.id}</p>
     <h3>${o.name}</h3>
        
     <p> <input type="number" value="${o.amount}" min="1" max="10" class="qty cart-row-amount" data-id="${o.id}" />
     &dollar;<span class="cart-row-price">${o.price}</span></p>
        
     <p class="stockStatus"> In Stock</p>
     </div>  
     <div class="prodTotal cartSection">
     <p>&dollar;<span class="cart-row-total">${o.total}</span></p>
     </div>
     <div class="cartSection removeWrap">
     <a href="#" class="js-delete-cart-item remove" data-id="${o.id}">x</a>
     </div>
     </div>
     </li>
`);

const cartTotalsTemplate = templater(o => `

 <ul>
     <li class="totalRow"><span class="label">Items</span><span class="value">${o.items}</span></li>
      
     <li class="totalRow"><span class="label">Subtotal</span><span class="value">&dollar;${o.total}</span></li>
      
          <li class="totalRow"><span class="label">Shipping</span><span class="value">$5.00</span></li>
      
            <li class="totalRow"><span class="label">Tax</span><span class="value">${o.tax}</span></li>
            <li class="totalRow final"><span class="label">Total</span><span class="value">&dollar;${o.aftertax}</span></li>
        
         <li class="totalRow"><a href="purchasepage.php" class="btn continue">Checkout</a></li>

`);