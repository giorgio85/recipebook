<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
    // Primero comprobamos que ningún campo esté vacío y que todos los campos existan.
    if(isset($_POST['send_comment_view']) && !empty($_POST['send_comment_view'])) {

        // Si entramos es que todo se ha realizado correctamente

       if (!($iden = mysqli_connect("localhost:3333", "root", "")))
        die("Error: No se pudo conectar");

       if (!mysqli_select_db($iden,"recipebook"))
        die("Error: No existe la base de datos");
        // Con esta sentencia SQL insertaremos los datos en la base de datos
       $comentario= $_POST['send_comment_view'];
       $sid=$_POST['id'];
       //$receta=$_SESSION['rec'];
       $idcomm=$_POST['num_comm'];
       //UPDATE Customers SET ContactName='Alfred Schmidt', City='Hamburg' WHERE CustomerName='Alfreds Futterkiste'; 
       $sentence = "UPDATE comment SET  texto= '$comentario' WHERE id='$idcomm'";
         mysqli_query($iden,$sentence);
         $commentId = mysqli_insert_id($iden);
        // Ahora comprobaremos que todo ha ido correctamente
        $my_error = mysqli_error($iden);

        if(!empty($my_error)){

            echo "Ha habido un error al insertar los valores. $my_error";

        } else {

            echo "Los datos han sido introducidos satisfactoriamente";
header('location:index2.php');
        }

    } else {

        echo "Error, no ha introducido todos los datos";

    }

?>