<?php
	if(session_status() == PHP_SESSION_NONE){
		session_start();
	}
	// Primero comprobamos que ningún campo esté vacío y que todos los campos existan.


	// Si entramos es que todo se ha realizado correctamente

	if (!($iden = mysqli_connect("localhost", "root", "")))
		die("Error: No se pudo conectar");

	if (!mysqli_select_db($iden,"recipebook"))
		die("Error: No existe la base de datos");
		// Con esta sentencia SQL insertaremos los datos en la base de datos
		$idcomm=$_POST['num_comm'];
		//UPDATE Customers SET ContactName='Alfred Schmidt', City='Hamburg' WHERE CustomerName='Alfreds Futterkiste';
		$sentence="DELETE FROM comment WHERE id ='$idcomm'";
		mysqli_query($iden,$sentence);
		$commentId = mysqli_insert_id($iden);
		// Ahora comprobaremos que todo ha ido correctamente
		$my_error = mysqli_error($iden);

	if(!empty($my_error)){

		echo "Ha habido un error al insertar los valores. $my_error";

	} else {

		echo "Se ha eliminado el comentario";
		Header('Location: '.$_SERVER['HTTP_REFERER']);
	}


?>