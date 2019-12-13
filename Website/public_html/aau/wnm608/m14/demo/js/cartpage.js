
$('a.remove').click(function(){
  event.preventDefault();
  $( this ).parent().parent().parent().hide( 400 );
 
})

// Just for testing, show all items
  $('a.btn.continue').click(function(){
    $('li.items').show(400);
  })

  const makeCartList = () => {
	console.log("honk")

	let c = getStore('cart');

	if(!c.length) {
		$(".cart-list")
			.html("<div>No items in Cart</div>");
		return;
	}
}


$(()=>{
	makeCartList();
});