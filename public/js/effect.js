function closeMenu(){
	var menu = document.getElementById('menu');
	var display = document.getElementById('display');
	menu.style.width = "0";	
	display.style.marginLeft = "0px";
	display.style.width = "100%";
	}
	
	function openMenu(){
		var menu = document.getElementById('menu');
	var display = document.getElementById('display');
	menu.style.width = "350px";	
	display.style.marginLeft = "350px";
	}
	
	function changeImg(smallImg){
		var showImg = document.getElementById('img');
		showImg.src = smallImg.src; 
	}
	
	function closeNotice(){
		document.getElementById('notice').style.display = "none";
	}
var i = 1;
var xx=0;
	function nextImg(){
		alert(i);
		var num = document.getElementsByClassName('column').length;
		var row = document.getElementById('row');

		var x = -100;
		row.style.transform = 'translate3d(' + (x*i-10) + 'px, 0px, 10px)';
		xx = x*i-10;
		if(i > num-1){
			i=0;
			return;
		}else{
			i++;
		}
	}

	function previousImg(){
		i--;
		if(i <= 0){
			i = 0;
		}
		var x = 100;
		var num = document.getElementsByClassName('column').length;
		var row = document.getElementById('row');
		row.style.transform = 'translate3d(' + (xx+x) + 'px, 0px, 10px)';
		xx += x;
		if(xx == 0 ||xx > 0){
			row.style.transform = 'translate3d(0px, 0px, 10px)';
			xx = 0;
			return;
		}
	}