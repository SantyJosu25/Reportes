<?php
include '../template/header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
</head>

<body>
    <div class="container" style="padding-left: 10px;">
        <div class="title_left">
            <h3>Lista de Clientes</h3>
        </div>

        <a href="../Json/cliente.php" title="Exportar a JSON"  class="btn btn-info btn-sm" style="float: right;"><i class="fa fa-file-text-o" aria-hidden="true"></i></a>
        
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Identificador</th>
                    <th scope="col">Documento de Identida</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Correo</th>                    
                    <th scope="col">Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM tbl_cliente";
                $result = mysqli_query($conexion, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $row['CLI_ID'] ?></td>
                        <td><?php echo $row['CLI_DNI'] ?></td>
                        <td><?php echo $row['CLI_NOMBRES'] ?></td>
                        <td><?php echo $row['CLI_CELULAR'] ?></td>
                        <td><?php echo $row['CLI_CORREO'] ?></td>
                        <td><?php if ($row['CLI_ESTADO'] == 'A') {
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