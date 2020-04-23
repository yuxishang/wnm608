

const showListPage =  () => {
	console.log("LIST PAGE")

	query({
		type:'locations_from_shops',
		params:[5]
	}).then(d=>{
		console.log(d)
	});
}


