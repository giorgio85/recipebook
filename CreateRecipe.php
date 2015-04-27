<?php

if(session_status() == PHP_SESSION_NONE){
    session_start();
}

function insertRecipe()
{
    if (!($iden = mysqli_connect("localhost", "root", "")))
        die("Error: No se pudo conectar");

    if (!mysqli_select_db($iden,"recipebook"))
        die("Error: No existe la base de datos");

    $name = htmlspecialchars($_POST['recipeName']);
    $description = htmlspecialchars($_POST['recipeDescription']);
    $difficulty = setRecipeDifficulty(htmlspecialchars($_POST['recipeDifficulty']));
    $preparationTime = htmlspecialchars($_POST['recipeTime']);
    $numberPerson = htmlspecialchars($_POST['recipePerson']);
    $ingredients = htmlspecialchars($_POST['recipeIngredients']);
    $instructions = htmlspecialchars($_POST['recipeInstructions']);
    $calories = htmlspecialchars($_POST['recipeCalories']);

    $target_dir = 'img/';
    $target_file = $target_dir . $_FILES['inputFile']['name'];
    $local_target_file = $_FILES['inputFile']['tmp_name'];

    copy($local_target_file,$target_file);

    $date = date('Y-m-d H:i:s');
    $userId='0';
   if (isset($_SESSION['id'])){
    $userId = $_SESSION['id'];}
    $sentence = "INSERT INTO recipe (name, description, id_level_difficulty, preparation_time, number_person, ingredients, instructions, calories, date, userid, img) VALUES
    ('$name','$description', '$difficulty', '$preparationTime', '$numberPerson', '$ingredients', '$instructions', '$calories', '$date', '$userId', '$target_file')";

    $result = mysqli_query($iden,$sentence);
    $recipeId = mysqli_insert_id($iden);
    if (!$result)
        die("Error: no se pudo insertar la receta");


    if(isset($_POST['breakfastCheckbox'])){
        $sentence = "INSERT INTO recipe_category (id_recipe, id_category) VALUES ('$recipeId', '1')";
        $result = mysqli_query($iden,$sentence);
        if (!$result)
            die("Error: no se pudo registrar la categoria");
    }

    if(isset($_POST['lunchCheckbox'])){
        $sentence = "INSERT INTO recipe_category (id_recipe, id_category) VALUES ('$recipeId', '2')";
        $result = mysqli_query($iden,$sentence);
        if (!$result)
            die("Error: no se pudo registrar la categoria");
    }

    if(isset($_POST['snackCheckbox'])){
        $sentence = "INSERT INTO recipe_category (id_recipe, id_category) VALUES ('$recipeId', '3')";
        $result = mysqli_query($iden,$sentence);
        if (!$result)
            die("Error: no se pudo registrar la categoria");
    }

    if(isset($_POST['dinnerCheckbox'])){
        $sentence = "INSERT INTO recipe_category (id_recipe, id_category) VALUES ('$recipeId', '4')";
        $result = mysqli_query($iden,$sentence);
        if (!$result)
            die("Error: no se pudo registrar la categoria");
    }
}

function setRecipeDifficulty($difficulty)
{
    switch ($difficulty) {
        case 'Easy':
            return 1;
        case 'Medium':
            return 2;
        case 'Hard':
            return 3;
    }
}

if(isset($_POST['createRecipe']))
{
    insertRecipe();
    header('location:index.php');
}
