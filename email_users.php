<?php

//session_start();

class email_users{
    function getAll(){

        
        if(!($iden = mysqli_connect("localhost", "root", "")))
            die("Error: No se pudo conectar");

        if(!mysqli_select_db($iden,"recipebook"))
            die("Error: No existe la base de datos");
        $limit=20;
        $next=0;
        $query = "SELECT x.name, x.surname, x.telephone, x.email, x.date_birth, x.id as id_profile, y.creation_time, y.modify_time, y.id_ban, y.id_rol, y.state, r.name as rol FROM user_profile as x  INNER join user_account as y on x.id=y.id_user_profile INNER join rol as r on r.id=y.id_rol LIMIT ".($next).",".($limit)."  ";
        $result = mysqli_query($iden,$query) or die('Consulta fallida: ' . mysqli_error($iden));


        while($row = mysqli_fetch_assoc($result)){
            $info_users [] = $row;
        }

        mysqli_close($iden);
        return $info_users;
    }
}

?>