<?php
include 'conexion.php';
$username = mysqli_real_escape_string($conexion, $_POST["nombre_completo"]);  
$telefono = mysqli_real_escape_string($conexion, $_POST["numero_telefono"]);  
$password = mysqli_real_escape_string($conexion, $_POST["password"]);  
$password = md5($password);  
$query = "INSERT INTO tbl_users (NOMBRE_COMPLETO_USUARIO,NUMERO_TELEFONO_USUARIO, PASSWORD) VALUES('$username','$telefono', '$password')";  
        echo $query;  
        if(mysqli_query($conexion, $query))  
           {  
            header("Location:../index.php?correcto=1");
           }  
           else{
            header("Location:../view/registrar_usuario.php?error=1");
           }
?>