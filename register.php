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
        $path = htmlspecialchars($_POST['image']);

        if (!($iden = mysqli_connect("localhost", "root", "")))
            die("Error: No se pudo conectar");

        if (!mysqli_select_db($iden,"recipebook"))
            die($iden);

        $sentencia = "INSERT INTO user_profile (name, surname, email, password, path) VALUES ('$name','$lastname', '$email', '$password', '$path')";

        $resultado = mysqli_query($iden,$sentencia);
              if (!$resultado)
            die("Error: no se pudo realizar la consulta");

        $sentencia = "SELECT * FROM user_profile WHERE email='$email'";
        $resultado = mysqli_query($iden,$sentencia);
        if (!$resultado)
            die("Error: no se pudo realizar la consulta");
        $count=0;
        while($row = mysqli_fetch_array($resultado)){
            $count++;
            $name= $row[1];
            $idu = $row[0];
            $path = $row[2];
        }
        if ($count ==1){
            $_SESSION['user'] = "$name";
            $_SESSION['id'] = "$idu";
            $_SESSION['photopath']="$path";
        }
        mysql_close($iden);
        header('location:index.php');
    }


    public static function comprobarUsuario()
    {
        $mail = htmlspecialchars($_POST['email1']);
        if (!($iden = mysqli_connect("localhost", "root", "")))
            die("Error: No se pudo conectar");

        if (!mysqli_select_db($iden,"recipebook"))
            die("Error: No existe la base de datos");

        $sentencia = "SELECT * FROM user_profile WHERE email='$mail'";

        $resultado = mysqli_query($iden,$sentencia);
        if (!$resultado) {
            die("Error: no se pudo realizar la consulta");
        }
        $count = 0;
        while ($row = mysqli_fetch_array($resultado)) {
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
    header('location:signinError.php');
}else{
    register::registrarUsuario();
}
