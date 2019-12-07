

const getAPI = () =>{
	//Fetch is a promise(js promise)
	return fetch(`data/api.php?type=1`)
	.then(data=>data.json()) 

}
$(()=>{

	getAPI()
	.then (d=>
		console.log(d))
	})

	$(".product-thumbs img").on("mouseenter",function(e){
		let s = $(this).attr("src");
		$(".product-imagemain img").attr("src",s);
	});
	
