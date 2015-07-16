	function myFunction() {
	xmlhttpp = new XMLHttpRequest();
	api = APIKEY;
	console.log(api);
	title = document.getElementById("title").value;
	console.log(title);
	data = document.getElementById("data-mine").value;
	console.log(data);
	rate = document.getElementById("rating").value;
	console.log(rate);
	link = document.getElementById("content-paragraph").value;
	console.log(link);
	pass_request = "http://localhost/Project/post.php?title="+title+"&data="+data+"&rate="+rate+"&APIKEY="+api+"&Is_Shown=0&link="+link;
	console.log(pass_request);
	xmlhttpp.open("GET",pass_request,true);
	xmlhttpp.send();
	document.getElementById("hide-this-stuff").style.display = "none";
	document.getElementById("hide-this-dude").style.display = "none";
}