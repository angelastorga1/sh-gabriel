<?php

include 'conexion.php';
  $numero = $_REQUEST['numero'];

$consultar_codigo_verificacion = "SELECT * FROM tbl_users  WHERE NUMERO_TELEFONO_USUARIO ='$numero' ";

$resultado = mysqli_query($conexion,$consultar_codigo_verificacion);

while($mostrar = mysqli_fetch_array($resultado)){
      $CODIGO_VERIFICACION = $mostrar['CODIGO_VERIFICACION'];
}
$mensaje = "WEB NOTICIAS\nGracias por querer verificarte para ser creador de contenido\nTu codigo e verificacion: ".$CODIGO_VERIFICACION;
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






?>