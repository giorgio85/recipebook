<?php

//session_start();

class Comment{
    function getAll(){

        if(!($iden = mysqli_connect("localhost:3333", "root", "")))
            die("Error: No se pudo conectar");

        if(!mysqli_select_db($iden,"recipebook"))
            die("Error: No existe la base de datos");

        $query = "SELECT * FROM comment ORDER BY id";
        $result = mysqli_query($iden,$query) or die('Consulta fallida: ' . mysqli_error($iden));


        while($row = mysqli_fetch_assoc($result)){
            $recipes [] = $row;
        }

        mysqli_close($iden);
        return $recipes;
    }
}

?>

