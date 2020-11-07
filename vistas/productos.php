<?php
include '../template/header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
</head>

<body>
    <div class="container" style="padding-left: 10px;">
        <div class="title_left">
            <h3>Lista de Productos</h3>
        </div>

        <a href="../Json/producto.php" title="Exportar a JSON"  class="btn btn-info btn-sm" style="float: right;"><i class="fa fa-file-text-o" aria-hidden="true"></i></a>
        
       <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Identificador</th>
                    <th scope="col">Código</th>
                    <th scope="col">Nombre del Producto</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Precio de Compra</th>
                    <th scope="col">Precio de Venta</th>
                    <th scope="col">Stock Mínimo</th>
                    <th scope="col">Stock Máximo</th>
                    <th scope="col">Fecha de Registro</th>
                    <th scope="col">Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM tbl_producto";
                $result = mysqli_query($conexion, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $row['PRO_ID'] ?></td>
                        <td><?php echo $row['PRO_CODIGO'] ?></td>
                        <td><?php echo $row['PRO_NOMBRE'] ?></td>
                        <td><?php echo $row['PRO_DESCRIPCION'] ?></td>
                        <td><?php echo $row['PRO_PRECIOCOMPRA'] ?></td>
                        <td><?php echo $row['PRO_PRECIO_VENTA'] ?></td>
                        <td><?php echo $row['PRO_STOCKMIN'] ?></td>
                        <td><?php echo $row['PRO_STOCKMAX'] ?></td>
                        <td><?php echo $row['PRO_ADD'] ?></td>

                        <td><?php if ($row['PRO_ESTADO'] == 'A') {
                                echo "<span class='badge badge-success'><i class='fa fa-check'></i> Activo</span>";
                            } ?></td>
                    </tr>
                <?php
                } ?>
            </tbody>
    </div>
    </table>


</body>

</html>
<?php include '../template/footer.php' ?>