
// ASYNC
const showListPage = async () => {
	let d = await query({
		type:'shops_from_user',
		params:[sessionStorage.userId]
	});

	console.log(d);

	$("#list-page .animallist")
		.html(makeShopList(d.result));
}


const showUserPage = async () => {
	let d = await query({
		type:'user_by_id',
		params:[sessionStorage.userId]
	});

	console.log(d);

	$("#profile-page .profile-content")
		.html(makeUserProfile(d.result));

}

const callShopProfile = (id,target) => {
	query({
		type:'shop_by_id',
		params:[id]
	}).then(d=>{
		console.log(d);

		$(target).html(makeShopProfile(d.result));
	});
}
const callShopMap = (id,target) => {
	query({
		type:'locations_from_shops',
		params:[id]
	}).then(async d=>{
		let map_el = await makeMap();

		makeMarkers(
			map_el,
			d.result
		);
	});
}

const showAnimalPage = async () => {
	if(sessionStorage.shopId===undefined) {
		throw("No shops id defined");
	}

	callAnimalProfile(
		sessionStorage.shopId,
		"#shop-profile-page .profile-content"
	);
	callAnimalMap(
		sessionStorage.shopId,
		"#shop-profile-page .map"
	);

}




const showRecentPage = async () => {
	let d = await query({
		type:'recent_shop_locations',
		params:[sessionStorage.userId]
	});

	// console.log(d);

	let map_el = await makeMap("#recent-page .map");

	makeMarkers(
		map_el,
		d.result.map(o=>{
			o.icon = o.img;
			// o.icon = `img/icons/icon_${o.type}.svg`;
			return o;
		})
	);
}