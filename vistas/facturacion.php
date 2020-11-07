<?php
include '../template/header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facturación</title>
</head>

<body>
    <div class="container" style="padding-left: 10px;">
        <div class="title_left">
            <h3>Lista de Facturas</h3>
        </div>
        <a href="../Xml/factura.php" title="Exportar a XML" target="_blank" class="btn btn-info btn-sm" style="float: right;"><i class="fa fa-file-text" aria-hidden="true"></i></a>
        
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Número de Pedido</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">Documento de Identidad</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Precio de venta</th>
                    <th scope="col">Precio Total</th>                   
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM vistafactura";
                $result = mysqli_query($conexion, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $row['PED_NUMERO'] ?></td>
                        <td><?php echo $row['CLI_NOMBRES'] ?></td>
                        <td><?php echo $row['CLI_DNI'] ?></td>
                        <td><?php echo $row['CLI_CELULAR'] ?></td>
                        <td><?php echo $row['CLI_CORREO'] ?></td>
                        <td><?php echo $row['PED_DIRECCION'] ?></td>
                        <td><?php echo $row['PRO_NOMBRE'] ?></td>
                        <td><?php echo $row['DEP_CANTIDAD'] ?></td>
                        <td><?php echo $row['PRO_PRECIO_VENTA'] ?></td>
                        <td><?php echo $row['DEP_PRECIOTOTAL'] ?></td>

                    </tr>
                <?php
                } ?>
            </tbody>
    </div>
    </table>


</body>

</html>
<?php include '../template/footer.php' ?>