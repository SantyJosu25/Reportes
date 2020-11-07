<?php
include '../template/header.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargos</title>
</head>

<body>
    <div class="container" style="padding-left: 10px;">
        <div class="title_left">
            <h3>Lista de Cargos</h3>
        </div>

        <a href="../Reportes/generarPdfCar.php" title="Exportar a PDF" target="_blank" class="btn btn-info btn-sm" style="float: right;"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Identificador</th>
                    <th scope="col">Empleado</th>
                    <th scope="col">Departamento</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT tbl_cargo.CAR_ID,tbl_empleado.EMP_NOMBRES,tbl_departamento.DEP_DESCRIPCION,tbl_cargo.CAR_DESCRIPCION,
        tbl_cargo.CAR_ESTADO FROM tbl_cargo INNER JOIN tbl_departamento ON 
        tbl_cargo.DEP_ID = tbl_departamento.DEP_ID INNER JOIN tbl_empleado ON 
        tbl_cargo.EMP_ID = tbl_empleado.EMP_ID";
                $result = mysqli_query($conexion, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $row['CAR_ID'] ?></td>
                        <td><?php echo $row['EMP_NOMBRES'] ?></td>
                        <td><?php echo $row['DEP_DESCRIPCION'] ?></td>
                        <td><?php echo $row['CAR_DESCRIPCION'] ?></td>
                        <td><?php if ($row['CAR_ESTADO'] == 'A') {
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
<?php require '../template/footer.php'

?>