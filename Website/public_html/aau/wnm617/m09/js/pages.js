
// ASYNC
const showListPage = async () => {
	let d = await query({
		type:'shops_from_user',
		params:[sessionStorage.userId]
	});

	console.log(d);

}


const showUserPage = async () => {
	let d = await query({
		type:'user_by_id',
		params:[sessionStorage.userId]
	});

	console.log(d);

}

