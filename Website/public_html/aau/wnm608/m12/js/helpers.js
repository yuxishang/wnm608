
// Curried functions
const templater = f => a =>
	(Array.isArray(a)?a:[a])
	.reduce((r,o,i,a)=>r+f(o,i,a),'');

const getAPI = (type,options) => {
	let fd = new FormData();
	for(let i in options)
		fd.append(i,options[i]);
	
	// Fetch is a Promise
	return fetch(
		`data/api.php?type=${type}`,
		{
			method:'POST',
			body:fd
		}
	).then(data=>data.json())
}