<?php

$db = mysqli_connect('localhost', 'root', '', 'reportes_db');
$sql = "SELECT * from tbl_cliente";
mysqli_set_charset($db, "utf8");
if (!$result = mysqli_query($db, $sql)) die("No se encontraron datos ");
$factura = array();
while ($row = mysqli_fetch_array($result)) {
    $id = $row['CLI_ID'];
    $dni = $row['CLI_DNI'];
    $nombres = $row['CLI_NOMBRES'];
    $celular = $row['CLI_CELULAR'];
    $correo= $row['CLI_CORREO'];
    $estado = $row['CLI_ESTADO'];
    

    $cliente[]=array('CLI_ID'=>  $id,
                     'CLI_DNI'=>$dni,
                     'CLI_NOMBRES'=>$nombres,
                     'CLI_CELULAR'=>$celular,
                     'CLI_CORREO'=>$correo,
                     'CLI_ESTADO'=>$estado);
                     
}
mysqli_close($db);
$resultadoJson=json_encode($cliente);

$file='cliente.json';
file_put_contents($file, $resultadoJson);


echo "<script> alert ('Archivo genereado en la carpeta Json' );location.href='../vistas/clientes.php'</script>";