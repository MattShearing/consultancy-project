function getTime() {
	var list = array();
    var time = document.getElementById("video_time").innerHTML;
    list += time;
    showList(list);
}
function showList(list) {
    display = document.getElementById("list").innerHTML;
    foreach (list as list_item) {
        display = display + "<li>" + list_item + "</li>";
	}
	document.getElementById("list").innerHTML = display;
}