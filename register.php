<?php
session_start();
class register
{
    public static function registrarUsuario()
    {
        $name = htmlspecialchars($_POST['user']);
        $lastname = htmlspecialchars($_POST['lastname1']);
        $email = htmlspecialchars($_POST['email1']);
        $password = md5(htmlspecialchars($_POST['password1']));
        $image = htmlspecialchars($_POST['image']);
		if ($image == NULL)
			$path="img/photos_bd/photo_standar.jpg";
		else $path=$image;
        if (!($iden = mysqli_connect("localhost:3333", "root", "")))
            die("Error: No se pudo conectar");

        if (!mysqli_select_db($iden,"recipebook"))
            die($iden);

        $sentencia = "INSERT INTO user_profile (name, surname, email, password, path) VALUES ('$name','$lastname', '$email', '$password', '$path')";
        $sentencia2 = "INSERT INTO user_account (password) VALUES ('$password')";

        $resultado = mysqli_query($iden,$sentencia);
              if (!$resultado)
            die("Error: no se pudo realizar la consulta");
        $_SESSION['user'] = $_POST['email1'];
        header('location:index.php');
    }


    public static function comprobarUsuario()
    {
        $mail = htmlspecialchars($_POST['email1']);
        if (!($iden = mysqli_connect("localhost:3333", "root", "")))
            die("Error: No se pudo conectar");

        if (!mysqli_select_db($iden,"recipebook"))
            die("Error: No existe la base de datos");

        $sentencia = "SELECT * FROM user_profile WHERE email='$mail'";

        $resultado = mysqli_query($iden,$sentencia);
        if (!$resultado) {
            die("Error: no se pudo realizar la consulta");
        }
        $count = 0;
        while ($row = mysqli_fetch_object($iden,$resultado)) {
            $count++;
        }
        if ($count == 1) {
            return 1;
        } else {
            return 0;
        }
    }
}

if (register::comprobarUsuario()==1){
    session_destroy();
    echo 'ya existe';
}else{
    register::registrarUsuario();
}
