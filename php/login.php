<?php 
Include 'conexion.php';

if(empty($_POST["numero_telefono"]) && empty($_POST["password"]))  
{  
    header("Location:../view/index.php?datos=1"); 
}  
else  
{  
     $username = mysqli_real_escape_string($conexion, $_POST["numero_telefono"]);  
     $pass = mysqli_real_escape_string($conexion, md5($_POST["password"])); 
     
     $query = "SELECT * FROM tbl_users WHERE NUMERO_TELEFONO_USUARIO = '$username' AND PASSWORD = '$pass'";  
     echo $query;
     $result = mysqli_query($conexion, $query);  
     if(mysqli_num_rows($result) > 0)  
     {  
         
          $_SESSION['ID_USUARIO'] = $username;  
          $_SESSION['NUMERO_TELEFONO_USUARIO']=$telefono; 
          $_SESSION['ID_ESTATUS_USUARIO']=$estatus; 
          $_SESSION['ID_ROL_USUARIO']=$rol;
          header("location:../view/home.php");  
     }  
     else  
     {  
        header("Location:../view/index.php?error=1");  
     }  
}  





?>