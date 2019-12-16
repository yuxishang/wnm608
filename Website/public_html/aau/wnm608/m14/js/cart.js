
const makeCartList = () => {
	console.log("honk")

	let c = getStore('cart');

	if(!c.length) {
		$(".cart-list")
			.html("<div>No items in Cart</div>");
		return;
	}

	let ids = c.map(o=>o.id);

	getAPI(30,{cart:ids})
	.then(d=>{
		console.log(d)

		$(".cart-list").html(cartListItemTemplate (d.result))
		
	})
}


const makeCartTotals = () => {
	let c = getStore('cart');
	let t = 0;
	$(".cart-row-total").each(function(){
		t += +$(this).html();
	})
	$(".cart-totals").html(cartTotalsTemplate([
		{
			total:t,
			items:c.length,
			tax:t*0.08,
			aftertax:t*1.08
		}
	]))
}


$(()=>{
	makeCartList();


	$(document)
	.on("change",".cart-row-amount",function(e){
		console.log(this.value)
		let p = +$(this).parent().prev().find(".cart-row-price").html();
		let a = +this.value;
		let t = $(this).parent().next().find(".cart-row-total");

		t.html((p*a).toFixed(2));

		makeCartTotals();


		let c = getStore('cart');
		c.find(o=>o.id==$(this).data("id")).amount = a;
		setStore('cart',c);
		setCartBadge();
	})
	.on("click",".js-delete-cart-item",function(e){
		e.preventDefault();
		let id = $(this).data("id");
		let c = getStore('cart').filter(o=>o.id!=id);
		setStore('cart',c);
		makeCartList();
		setCartBadge();
	})
});