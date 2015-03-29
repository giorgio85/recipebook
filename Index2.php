<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">

        <!-- Resourse "http://ashobiz.asia/cakefactory125"> -->

        <!-- Title here -->

        <title> Gallery - RecipeBook </title>

        <!-- Description, Keywords and Author -->

        <meta content="Your description" name="description">
        <meta content="Your,Keywords" name="keywords">
        <meta content="ResponsiveWebInc" name="author">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <!-- Styles -->

        <!-- Bootstrap CSS -->

        <link rel="stylesheet" href="css/bootstrap.min.css">

        <!-- Carrusel Bootstrap CSS -->

        <link href="css/carousel.css" rel="stylesheet">

        <!-- Portfolio CSS -->

        <link rel="stylesheet" href="css/prettyPhoto.css">

        <!-- Font awesome CSS -->

        <link rel="stylesheet" href="css/font-awesome.min.css">

        <!-- Custom Less -->

        <link rel="stylesheet" href="css/less-style.css">

        <!-- Custom CSS -->

        <link rel="stylesheet" href="css/style.css">

    </head>


    <body onload="hidden();">
        <div class="container marketing"> <!-- TODO CREATE SCRIPT GENERATE DIV-->
            <div class="row">
                <div id="my_recipes">
                    <?php
                    require('recipe.php');
                    require('comment.php');
                    $recipe = new Recipe();
                    $result = $recipe->getAll();
                    $comm = new Comment();
                    $rescomm = $comm->getAll();

                    foreach ($result as $item) {
                        echo '<div class="col-lg-2">';
                        echo '<img class="img-circle" src="' . $item['img'] . '" style="margin-top:20px;" alt="Generic placeholder image" width="100" height="100">';
                        echo '<h2>' . $item["name"] . '</h2>';
                        echo '<p><a class="btn btn-default" href="#" onclick="viewRecipe(' . $item["id"] . ');" role="button">View details &raquo;</a></p>';
                        echo '</div>';
                    }
                    ?>

                </div>
                <!-- Design recipe -->
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

/**
 * Notas: En la vista de la receta, los check están por defecto, igual que los ingrediente, tags
 * y las calorías. En ninguno de los casos hay referencias en la BD a estos apartados (en el caso de las
 * calorías están numéricamente pero no sabemos a partir de cuántas calorías se considería
 * alta, baja, media, etc.
 *
 * Respecto a la navegación, el botón de my recipes solo funciona desde home, además, recipebook tiene un
 * enlace roto
 */
foreach ($result as $item) {

    echo '<div id="recipe_' . $item['id'] . '" class="information_recipe_view" style="display:none;">

            <div id="my_img_recipe_view"><img src="' . $item['img'] . '" style="margin:20px 20px 180px 0; float:left;"
                                              alt="Generic placeholder image" width="350" height="350"></div>
            <div class="form-group">
                <b><p id="name_recipe_view" style="margin-top:10px;">' . $item["name"] . '</p></b>

                <p id="description_view" style="margin: 0 0 20px  0;">
                    ' . $item["description"] . '
                </p>
                <label class="checkbox-inline" style="margin:0 0 20px 0;">
                    <input type="checkbox" id="inlineCheckbox1_view" value="option1" style="float:left;" disabled><b>Breakfast</b>
                </label>

                <label class="checkbox-inline" style="margin:0 0 20px 0;">
                    <input type="checkbox" id="inlineCheckbox2_view" value="option2" style="float:left;" disabled
                           checked><b>Lunch</b>
                </label>

                <label class="checkbox-inline" style="margin:0 0 20px 0;">
                    <input type="checkbox" id="inlineCheckbox3_view" value="option3" style="float:left;" disabled><b>Snack</b>
                </label>

                <label class="checkbox-inline" style="margin:0 0 20px 0;">
                    <input type="checkbox" id="inlineCheckbox3_view" value="option3" style="float:left;" disabled
                           checked><b>Dinner</b>
                </label>

                <input type="text" class="form-control" id="person_recipe_view" placeholder="' . $item["number_person"] . '"
                       style="width: 80px; float:right; margin: 0 10px 15px 0" disabled><img src="img/person.png"
                                                                                             style="height:30px; width: 30px; float:right"
                                                                                             class="img-circle">
                <input type="text" class="form-control" id="time_recipe_view" placeholder="' . $item["preparation_time"] . '"
                       style="width: 80px; float:right; margin: 0 10px 15px 0" disabled><img src="img/time.png"
                                                                                             style="height:30px; width: 30px; float:right"
                                                                                             class="img-circle">
                <input type="text" class="form-control" id="calories_recipe_view" placeholder="' . $item["calories"] . '"
                       style="width: 80px; float:right; margin: 0 10px 15px 0" disabled><img src="img/kcal.png"
                                                                                             style="height:30px; width: 30px; float:right"
                                                                                             class="img-circle">
                <input type="text" class="form-control" id="calories_recipe_view" placeholder="Hight"
                       style="width: 80px; float:right; margin: 0 10px 15px 0" disabled><img src="img/level.jpg"
                                                                                             style="height:30px; width: 30px; float:right"
                                                                                             class="img-circle">
                <hr>
                <p><b>Instructions</b>

                <p id="instructions_recipe_view" style="margin-top:10px;">
                    ' . $item["instructions"] . '
                </p></p>
                <hr>
                <p><b>Ingredients</b>

                <p id="ingredients_recipe_view" style="margin-top:10px;">
                   ' . $item["ingredients"] . '
                </p></p>
                <hr>
                <p><b>Tags<p id="instructions_recipe_view" style="margin-top:10px;">#Fish, #Healthy, #Vegetable</p></b>
                </p>
                <hr>
                <p style="margin:10px 0 0 380px" ;><b>COMMENTS</b>';

    foreach ($rescomm as $comment) {
        echo '<p id="comments_view" style="margin:10px 0 0 380px" ;> ';
        if ($comment['id_recipe'] == $item['id']) {
             echo $comment["texto"];
            if ($comment['id_user'] == $_SESSION['id']) {
                //EDITAR COMENTARIO PROPRIO
                echo'<input type="submit" class="btn btn-success" style="width:100%;" value="Edit" data-target="edit_modal">
                    <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="edit_modal" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="edit_modal"><b>Edit</b></h4>
                                    </div>
						<form action = "editar.php" method="post">
					<div class="modal-body">
                                            <div class="form-group">
                                            <input type="hidden" name="num_comm" value="' . $comment['id'] . '">
                                                <label for="texto">Nuevo Texto</label>
                                                 <textarea id="send_comment_view" style="resize:none; margin:0px 0 0 380px;"
                                                 name="send_comment_view" cols=110 rows=3 placeholder="' . $comment['texto'] . '"></textarea>
                                            </div>
                                           </div>
					<div class="modal-footer">
                               
					
										</div>
									</form>
                                </div>
                            </div>
                        </div>';
                }
         
        }
    }
    //COMENTARIO 
    echo '</p></p>
                <br>
                <div class="form-group">
                <form action="insertar_comentario.php" method="post">
                    <input type="hidden" name="num_recipe" value="' . $item['id'] . '">
                    <textarea id="send_comment_view" style="resize:none; margin:0px 0 0 380px;"
                    name="send_comment_view" cols=110 rows=3 placeholder=" &nbsp;"></textarea>
                   <input type="submit" class="btn btn-success" style="width:100px; margin-left:380px" value="Send">
                </form>
                 </div>
            </div>
        </div>';
}
?>
            </div>
        </div>
        <!-- Javascript files -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jsfunction.js"></script>

    </body>
</html>

