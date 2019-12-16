

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
          <div class="add-to-cart text-center">
          <a href="#">ADD TO CART</a></div>
          <a href="#" class="like"><div class="fav">
          <input type="checkbox" id="${o.id}" class="hidden">
          <label for="${o.id}">&hearts;</label></div></a></div></div>`
          );


const cartListItemTemplate = templater(o => `

     <li class="items odd">    
     <div class="infoWrap"> 
     <div class="cartSection">
     <img src="${o.image_main}" alt="" class="itemImg" />
     <p class="itemNumber">#Cho-Dark-${o.id}</p>
     <h3>${o.name}</h3>
        
     <p> <input type="number" value="${o.amount}" min="1" max="10" class="form-input cart-row-amount" data-id="${o.id}" /> x &dollar;${o.price}</p>
        
     <p class="stockStatus"> In Stock</p>
     </div>  
     <div class="prodTotal cartSection">
     <p>$45.00</p>
     </div>
     <div class="cartSection removeWrap">
     <a href="#" class="remove">x</a>
     </div>
     </div>
     </li>

     

`);

const cartTotalsTemplate = templater(o => `
<div>
     <h3>Items</h3>
     <div>${o.items}</div>
     <h3>Total</h3>
     <div>&dollar;${o.total.toFixed(2)}</div>
     <h3>Tax</h3>
     <div>&dollar;${o.tax.toFixed(2)}</div>
     <hr />
     <h3>Total</h3>
     <div>&dollar;${o.aftertax.toFixed(2)}</div>
</div>
`);