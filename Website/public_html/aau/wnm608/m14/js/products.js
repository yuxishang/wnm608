
const showList = d=>{
	$(".product-list")
		.html(productListTemplate(d.result))
}


$(()=>{

	setCartBadge();


	$(".product-thumbs img").on("mouseenter",function(e){
		let s = $(this).attr("src");
		$(".product-imagemain img").attr("src",s);
	});


	$("#list-search-form").on("submit",function(e){
		e.preventDefault();

		let s = $(".list-search").val();

		console.log(s);

		getAPI(10,{search:s})
		.then(showList);
	});


	$(".list-filter").on("change",function(e){
		let v = this.value;
		console.log(v);


		(
			v=="" ?
			getAPI(1) :
			getAPI(3,{category:v})
		).then(showList);
	})


	$(".js-add-to-cart").on("click",function(e){

		let c = getStore('cart');
		let id = $(this).data("id");
		let p = c.find(o=>o.id==id);

		console.log(c,id,p)
		if(!p) {
			c.push({
			'id':id,
			amount:1
		});
		} else p.amount++;

		setStore('cart',c);
		setCartBadge()

	
	})
	

	$(".list-sort").on("change",function(e){
		let v = this.value;
		console.log(v);

		(
			v==1 ?
				getAPI(20,{sort:'best',dir:'DESC'}) :
			v==2 ?
				getAPI(20,{sort:'price',dir:'ASC'}) :
			v==3 ?
				getAPI(20,{sort:'price',dir:'DESC'}) :
			getAPI(1)
		).then(showList);
	})
	
})