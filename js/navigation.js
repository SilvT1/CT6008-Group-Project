/**Modal navigation
started by Tiago
modified by Felicia**/
var modal = document.getElementById('myModal');
var btn = document.getElementById('menucontainer');

function menuFunction(x) {
    x.classList.toggle("change");

	if(modal.style.display==="block"){
	    modal.style.display = "none";
	}else{
	    modal.style.display = "block";
	}
}


//if on the home page, then animate homescreen image
if(window.location.pathname==="/index.php" || window.location.pathname==="/"){
	var hero=document.getElementById('zoomimg');
	if((window.innerWidth/window.innerHeight)>1.5){
		hero.style.width="100%";
		hero.style.height="auto";
	}else{
		hero.style.width="auto";
		hero.style.height="100%";
	}

	window.addEventListener('scroll', function() {
			var scrollBarPosition = window.pageYOffset | document.body.scrollTop;
			//console.log(scrollBarPosition);

			if((window.innerWidth/window.innerHeight)>1.5){
				hero.style.width = (100 + scrollBarPosition/5)  + "%";
			}else{
				hero.style.height = (100 + scrollBarPosition/5)  + "%";
			}
			//console.log(100 + scrollBarPosition/5);
			hero.style.top = -(scrollBarPosition/10)  + "%";
	});

	window.onresize=function(){location.reload();}
}


// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
    	btn.classList.toggle("change");
        modal.style.display = "none";
    }
} 