function showImage(e) {
	e.preventDefault();
	coverimage.setAttribute("src", this.getAttribute("href"));
	coverimage.setAttribute("alt", this.querySelector("img").getAttribute("alt"));
	cover.showModal();
}
document.getElementById("closecover").onclick = function() { 
	coverimage.setAttribute("src", "");
	cover.close();
}
var imglinks = document.getElementById("thumbs").getElementsByTagName('a'),
cover = document.getElementById("cover"),
coverimage = cover.getElementsByTagName("img")[0];
testdialog=document.createElement("dialog");
testdialog.setAttribute("open", "");
if (!testdialog.open) { 
	dialogPolyfill.registerDialog(cover); 
}
for (var i=0; i<imglinks.length; i++) { 
	imglinks[i].onclick = showImage; 
}
cover.addEventListener("click", function() {
  cover.close();
})