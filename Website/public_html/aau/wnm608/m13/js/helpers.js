
// Curried functions
const templater = f => a =>
	(Array.isArray(a)?a:[a])
	.reduce((r,o,i,a)=>r+f(o,i,a),'');



const getAPI = () => {
	//Fetch is a Promise
	return fetch(
		`data/api.php?type=${type}`,)
	.then(data=>data.json())
}