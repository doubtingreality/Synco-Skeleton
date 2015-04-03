$("#survey-page-holder").height(window.innerHeight-$(".row-top").height()+"px");

window.onresize = function() {
	$("#survey-page-holder").height(window.innerHeight-$(".row-top").height()+"px");
}