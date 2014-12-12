function addNew() {
	count = document.getElementById("count").innerHTML;
	count++;
	document.getElementById("count").innerHTML = count;
	console.log(count);
    newp = '<p>Point '+count+'<br><label>Start: </label><input type="text" id="start'+count+'" name="start'+count+'"><label>End: </label><input type="text" id="end'+count+'" name="end'+count+'"></p>';
    document.getElementById("input_fields").innerHTML += newp;
}