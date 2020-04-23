

// PROMISES
const query = (options) => {
	return fetch('php/data.php',{
		method:'POST',
		body:JSON.stringify(options),
		headers:{'Content-Type':'application/json'}
	}).then(d=>d.json());
}


