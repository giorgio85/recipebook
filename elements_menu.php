<?php

    include 'CreateRecipe.php';

    if (isset($_SESSION['user'])){
        $url=htmlspecialchars($_SESSION['photopath']);
        if ($url == NULL){
            $url="img/photos_bd/photo_standar.jpg";
        }
		
		$form = '


				<li>
					<a href="index.php?p=myrecipes"><img class="img-responsive" alt="" src="img/book-recipe.png"> Recipes </a>
				</li>

				'."
				<!-- New recipe modal -->
				<li>
					<a href='#' data-toggle='modal' data-target='#newRecipe_modal'><img class='img-responsive' alt='' src='img/recipe.png'/>New Recipe</a>
					<div class='modal fade' id='newRecipe_modal' tabindex='-1' role='dialog' aria-labelledby='login_modal' aria-hidden='true'>
						<div class='modal-dialog'>
							<div class='modal-content'>
								<div class='modal-header'>
									<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
									<h4 class='modal-title' id='newRecipe_modal'><img src='img/icon-recipe.png' style='height:40px; width: 40px; float:left'><b> &nbsp;New recipe</b></h4>
								</div>
								<div class='modal-body'>
									<form id='form_new_recipe' action='CreateRecipe.php' method='post' enctype='multipart/form-data'>
										<div class='form-group'>
											<input type='text' class='form-control' id='name_recipe' name='recipeName' placeholder='Name of recipe'>
										</div>

										<div class='form-group'>
											<textarea id='description' name='recipeDescription' rows=3 style=' resize: none; width:100%;' placeholder=' &nbsp;Description'></textarea>
										</div>

										<div class='form-group'>

											<input type='file' id='inputFile' name='inputFile' style='float:right; width: 260px; margin: 0 0px 0 0 '>

											<label class='checkbox-inline'>
												<input type='checkbox' id='inlineCheckbox1' name='breakfastCheckbox' value='option1' style='float:left;'>Breakfast
											</label>

											<label class='checkbox-inline'>
												<input type='checkbox' id='inlineCheckbox2' name='lunchCheckbox' value='option2' style='float:left;'>Lunch
											</label>

											<label class='checkbox-inline'>
												<input type='checkbox' id='inlineCheckbox3' name='snackCheckbox' value='option3' style='float:left;'>Snack
											</label>

											<label class='checkbox-inline'>
												<input type='checkbox' id='inlineCheckbox3' name='dinnerCheckbox' value='option3' style='float:left;'>Dinner
											</label>
										</div>

										<div class='form-group'>
											  <input type='text' class='form-control' id='time_recipe' name='recipeTime' placeholder='Time' style='width: 100px; float:right; margin: 0 10px 15px 0'><img src='img/time.png' style='height:30px; width: 30px; float:right'class='img-circle'>
											  <input type='text' class='form-control' id='person_recipe' name='recipePerson' placeholder='Person' style='width: 100px; float:right; margin: 0 10px 15px 0 '><img src='img/person.png' style='height:30px; width: 30px; float:right'class='img-circle'>
											  <input type='text' class='form-control' id='calories_recipe' name='recipeCalories' placeholder='Calories' style='width: 100px; float:right; margin: 0 10px 15px 0 '><img src='img/kcal.png' style='height:30px; width: 30px; float:right'class='img-circle'>
											  <img src='img/level.jpg' style='height:30px; width: 30px; float:left'class='img-circle'>
											  <select class='form-control' id='difficulty_recipe' name='recipeDifficulty' style='width: 100px; float:left; margin: 0 10px 15px 0 '>
												  <option> Easy </option>
												  <option> Medium </option>
												  <option> Hard </option>
											  </select>
										</div>
										<div class='form-group'>
											<textarea id='instructions' name='recipeInstructions' rows=4 style=' resize: none; width:100%;' placeholder=' &nbsp;Instructions'></textarea>
										</div>
										<div class='form-group'>
											<textarea id='ingredients' name='recipeIngredients'  rows=3 style=' resize: none; width:100%;' placeholder=' &nbsp;Enter ingredients separated by commas'></textarea>
										</div>
										<div class='form-group'>
											<textarea id='description' name='recipeLabels'  rows=3 style=' resize: none; width:100%;' placeholder=' &nbsp;Enter tags separated by commas'></textarea>
										</div>
										<div class='modal-footer'>
								            <input type='submit' name='createRecipe' class='btn btn-success' style='width:100%;' value='Create'/>
								        </div>
									</form>
								</div>

							</div>
						</div>
					</div>
				</li>

				<li class='dropdown hidden-xs'>
					<a class='dropdown-toggle' data-toggle='dropdown' href='#'><img class='img-responsive' alt='' src='img/news.png'/>News<b class='caret'></b></a>
					<ul class='dropdown-menu dropdown-md'>
						<li>
							<div class='row'>
								<div class='col-md-4 col-sm-6'>
									<div class='menu-item'>
										<h3> Followed profiles </h3>
										<img class='dish img-responsive' alt='' src='img/users.jpg'>
										<p>You can follow automatically your friends and see their posts in your blog </p>
										<a class='btn btn-danger btn-xs' href='menu.html'> View </a>
									</div>
								</div>

								<div class='col-md-4 col-sm-6'>
									<div class='menu-item'>
										<h3> Recommendations </h3>
										<img class='dish img-responsive' alt='' src='img/dish/paella.jpg'/>
										<img class='dish img-responsive' alt='' src='img/dish/pasta1.jpg'>
										<p>According to your tastes we suggest some recipes</p>
										<a class='btn btn-danger btn-xs' href='menu.html'>View</a>
									</div>
								</div>

								<div class='col-md-4'>
									<div class='menu-item'>
										<h3> Healthy leaving </h3>
										<img class='dish img-responsive' alt='' src='img/healthy.jpg'>
										<p>You can make changes to your lifestyle. By taking steps toward healthy living, you can help reduce your risk of heart disease, cancer, stroke and other ...</p>
										<a class='btn btn-danger btn-xs' href='menu.html'>View</a>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</li>

				<li class='dropdown'>
					<a class='dropdown-toggle' data-toggle='dropdown' href='#'><img class='img-responsive' alt='' src='img/profile.png'/> Profile <b class='caret'></b></a>
					<ul class='dropdown-menu'>
						<li>
							<a href='#'> Configuration </a>
						</li>
						<li>
							<a href='0-base.html'> Blog </a>
						</li>
						<li>
							<a href='blog.html'> Activity Log </a>
						</li>
					</ul>
				</li>

				<li>
					<a href='formulary.html'><img class='img-responsive' alt='' src='img/star.png'/> Favorites </a>
				</li>
				<li>
					<a href='aboutus.html'><img class='img-responsive' alt='' src='$url'/> My Blog </a>
				</li>
				<li>
					<a href='#' onclick='viewUsers()'><img class='img-responsive' src='img/users.png'/> User Control </a>
											
				</li>";
		echo $form;
	}
?>