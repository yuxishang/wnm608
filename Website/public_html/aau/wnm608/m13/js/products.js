
$(()=>{

	getAPI(1)
	.then (d=>
		console.log(d)
		$(".product-list")
			.html(productListTemplate(d.result))
	})

	$(".product-thumbs img").on("mouseenter",function(e){
		let s = $(this).attr("src");
		$(".product-imagemain img").attr("src",s);
	});
	
