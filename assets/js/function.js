function getTime() {
    var list = [];
    var time = document.getElementById("video_time").innerHTML;
    list.push(time);
    showList(list);
}
function showList(list) {
    display = document.getElementById("list").innerHTML;
    for (index = 0; index < list.length; ++index) {
        display += "<li>" + list[index] + "</li>";
    }
    document.getElementById("list").innerHTML = display;
}
function addNew() {
	count = document.getElementById("count").innerHTML;
	count++;
	document.getElementById("count").innerHTML = count;
	console.log(count);
    newp = '<p>Point '+count+'<br><label>Start: </label><input type="text" id="start'+count+'" name="start'+count+'"><label>End: </label><input type="text" id="end'+count+'" name="end'+count+'"></p>';
    document.getElementById("input_fields").innerHTML += newp;
}