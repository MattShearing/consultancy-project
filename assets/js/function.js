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