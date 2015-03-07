

var opened = false;

$(document).ready(function(){
	//alert("here");
	document.getElementById('sliding-menu').style.top= 0 + "px";
	document.getElementById('sliding-menu').style.left= -document.getElementById('sliding-menu').clientWidth + "px";
	$("#toggle-button").click(toggleMenu);
})



function toggleMenu()
{
	if(opened == true)
	{
		
		var r = 0;
		r += "px";
		var rr = -document.getElementById('sliding-menu').clientWidth;
		rr += "px";
		$("#sliding-menu").animate({left:rr},{ duration: 400, queue: false })
		$("#content").animate({left:r},{ duration: 400, queue: false })
		opened = false;
	}
	else
	{
		var r = 0;
		r += "px";
		var rr = document.getElementById('sliding-menu').clientWidth;
		rr += "px";
		$("#sliding-menu").animate({left:r},{ duration:400, queue: false })
		$("#content").animate({left:rr},{ duration: 400, queue: false })
		opened = true;
	}
}