<?php
include '../template/header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleados</title>
</head>

<body>
    <div class="container" style="padding-left: 10px;">
        <div class="title_left">
            <h3>Lista de Empleados</h3>
        </div>
        <a href="../Reportes/generarPdfEmp.php" title="Exportar a PDF" target="_blank" class="btn btn-info btn-sm" style="float: right;"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Identificador</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">Documento de Identidad</th>
                    
                    <th scope="col">Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM tbl_empleado";
                $result = mysqli_query($conexion, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $row['EMP_ID'] ?></td>
                        <td><?php echo $row['EMP_NOMBRES'] ?></td>
                        <td><?php echo $row['EMP_DNI'] ?></td>
                        <td><?php if ($row['EMP_ESTADO'] == 'A') {
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