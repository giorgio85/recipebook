

function hidden(){
	document.getElementById('view_all_recipe').style.display='none';	
}
function jshidden(){ //see all recipes icons
	document.getElementById('myCarousel').style.display='none';
    document.getElementById('view_all_recipe').style.display='block';
}
function viewRecipe(id){
    id = "recipe_" + id;
	document.getElementById('my_recipes').style.display='none';
	document.getElementById(id).style.display='block';
	parent.document.getElementById('view_recipes').style.height = '1000px';
}





