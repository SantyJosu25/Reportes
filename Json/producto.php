<?php

$db = mysqli_connect('localhost', 'root', '', 'reportes_db');
$sql = "SELECT * from tbl_producto";
mysqli_set_charset($db, "utf8");
if (!$result = mysqli_query($db, $sql)) die("No se encontraron datos ");
$productos = array();
while ($row = mysqli_fetch_array($result)) {
    $id = $row['PRO_ID'];
    $codigo = $row['PRO_CODIGO'];
    $nombres = $row['PRO_NOMBRE'];
    $des = $row['PRO_DESCRIPCION'];
    $pc= $row['PRO_PRECIOCOMPRA'];
    $pv = $row['PRO_PRECIO_VENTA'];
    $sma = $row['PRO_STOCKMIN'];
    $smi = $row['PRO_STOCKMAX'];
    $estado = $row['PRO_ESTADO'];
    

    $producto[]=array('PRO_ID'=>  $id,
                     'PRO_CODIGO'=>$codigo,
                     'PRO_NOMBRE'=>$nombres,
                     'PRO_DESCRIPCION'=>$des,
                     'PRO_PRECIOCOMPRA'=>$pc,
                     'PRO_PRECIO_VENTA'=>$pv,
                     'PRO_STOCKMIN'=>$sma,
                     'PRO_STOCKMAX'=>$smi,
                     'PRO_ESTADO'=>$estado);
                     
}
mysqli_close($db);
$resultadoJson=json_encode($producto);

$file='productos.json';
file_put_contents($file, $resultadoJson);

echo "<script> alert ('Archivo genereado en la carpeta Json ' );location.href='../vistas/productos.php'</script>";