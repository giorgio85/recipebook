

function jshidden(){ //see all recipes icons
	if(getParameterByName('p')=='myrecipes'){
		document.getElementById('my_recipes').classList.remove("hidden");	
	}else if(getParameterByName('r') != "")
	{
		var id = "recipe_" + getParameterByName('r');
		document.getElementById(id).classList.remove("hidden");
	}else{
		document.getElementById('myCarousel').classList.remove("hidden");
	}
}

function viewRecipe(id){
    window.location = 'index.php?r='+id
}

function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

function viewUsers(){
	document.getElementById('myCarousel').classList.add("hidden");
	document.getElementById('my_recipes').classList.add("hidden");
	document.getElementById('emails').classList.remove("hidden");	
}