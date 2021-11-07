<?php 
include 'conexion.php';
$numero = $_REQUEST['numero'];
$numero_verificacion = $_REQUEST['numero_verificacion'];
$consultar_codigo_verificacion = "SELECT * FROM tbl_users  WHERE NUMERO_TELEFONO_USUARIO ='$numero' ";

$resultado = mysqli_query($conexion,$consultar_codigo_verificacion);

while($mostrar = mysqli_fetch_array($resultado)){
      $CODIGO_VERIFICACION = $mostrar['CODIGO_VERIFICACION'];
}
if($CODIGO_VERIFICACION == $numero_verificacion){
    $verificar_numero = "UPDATE tbl_users SET ID_ESTATUS_USUARIO ='1', ID_ROL_USUARIO = '2' WHERE NUMERO_TELEFONO_USUARIO ='$numero' ";
    $resultados = mysqli_query($conexion,$verificar_numero);
    if($resultados){
        $mensaje = "WEB NOTICIAS\nTu cuenta ha sido verificada gracias por verificarte\npara ver los cambios cierra sesion y vuelve a iniciarla";
            $data = [
                'phone' => '52'.$numero, // Receivers phone
                'body' => $mensaje, // Message
            ];
            $json = json_encode($data); // Encode data to JSON
            // URL for request POST /message
            $token = '4jewsi9vyz9mgeha';
            $instanceId = '362620';
            $url = 'https://api.chat-api.com/instance'.$instanceId.'/message?token='.$token;
            // Make a POST request
            $options = stream_context_create(['http' => [
                    'method'  => 'POST',
                    'header'  => 'Content-type: application/json',
                    'content' => $json
                ]
            ]);
            // Send a request
            $result = file_get_contents($url, false, $options);
        $response = 0;
       echo $response;
    }
    else{
        $response = 2;
        echo $response;
    }
}
else{
    $response = 1;
    echo $response;
}








?>