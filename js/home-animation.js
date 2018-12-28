window.onload = function () {
	var parallaxBox = document.getElementById ( 'overlay' );
	var c1left = document.getElementById ( 'l1' ).offsetLeft,
	c1top = document.getElementById ( 'l1' ).offsetTop,
	c2left = document.getElementById ( 'l2' ).offsetLeft,
	c2top = document.getElementById ( 'l2' ).offsetTop,
	c3left = document.getElementById ( 'l3' ).offsetLeft,
	c3top = document.getElementById ( 'l3' ).offsetTop,
	c4left = document.getElementById ( 'l4' ).offsetLeft,
	c4top = document.getElementById ( 'l4' ).offsetTop;
	console.log(c1left+" "+c1top+" "+c2left+" "+c2top+" "+c3left+" "+c3top+" "+c4left+" "+c4top)
	
		
	mouseParallax ( 'l1', c1left, c1top, 10, 0, 15 );
	mouseParallax ( 'l2', c2left, c2top, 10, 0, 5 );
	mouseParallax ( 'l3', c3left, c3top, 10, 0, 5 );
	mouseParallax ( 'l4', c4left, c4top, 10, 0, 15 );

	parallaxBox.onmousemove = function ( event ) {
		event = event || window.event;
		var x = event.clientX - parallaxBox.offsetLeft,
		y = event.clientY - parallaxBox.offsetTop;
		
		mouseParallax ( 'l1', c1left, c1top, x, y, 60 );
		mouseParallax ( 'l2', c2left, c2top, x, y, 30 );
		mouseParallax ( 'l3', c3left, c3top, x, y, 20 );
		mouseParallax ( 'l4', c4left, c4top, x, y, 60 );
	}	
}

function mouseParallax ( id, left, top, mouseX, mouseY, speed ) {
	var obj = document.getElementById ( id );
	var parentObj = obj.parentNode,
	containerWidth = parseInt( parentObj.offsetWidth ),
	containerHeight = parseInt( parentObj.offsetHeight );
	obj.style.left = left - ( ( ( mouseX - ( parseInt( obj.offsetWidth ) / 2 + left ) ) / containerWidth ) * speed ) + 'px';
	obj.style.top = top - ( ( ( mouseY - ( parseInt( obj.offsetHeight ) / 2 + top ) ) / containerHeight ) * speed ) + 'px';
}