<?php
/**
 * Created by PhpStorm.
 * User: Christo
 * Date: 24/03/2015
 * Time: 11:18
 */
session_start();

class login{
    public static function comprobarUsuario(){
        $email = htmlspecialchars($_POST['email1']);
        $password = md5(htmlspecialchars($_POST['password']));
        if(!($iden = mysqli_connect("localhost:3333", "root", "")))
            die("Error: No se pudo conectar");

        if(!mysqli_select_db($iden,"recipebook"))
            die("Error: No existe la base de datos");


        $sentencia = "SELECT * FROM user_profile WHERE email='$email' and password='$password'";
        $resultado = mysqli_query($iden,$sentencia);
        if(!$resultado) {
            die("Error: no se pudo realizar la consulta");
        }
        $count = 0;
        while($row = mysqli_fetch_array($resultado)){
            $count++;
			$var= $row[1];
                        $idu=$row[0];
        }
        
        if($count == 1){
            $_SESSION['user'] = "$var";
            $_SESSION['id']="$idu";
          
            return 1;
        }
        else{
            return 0;
        }

    }
}
if(login::comprobarUsuario()==1){
    header('location:index.php');
}
echo 'REGISTRATE';
?>