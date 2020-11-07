<?php  
include '../template/plantilla.php';
$bd=mysqli_connect('localhost', 'root', '', 'reportes_db');
$sql="SELECT tbl_cargo.CAR_ID,tbl_empleado.EMP_NOMBRES,tbl_departamento.DEP_DESCRIPCION,tbl_cargo.CAR_DESCRIPCION,
tbl_cargo.CAR_ESTADO FROM tbl_cargo INNER JOIN tbl_departamento ON 
tbl_cargo.DEP_ID = tbl_departamento.DEP_ID INNER JOIN tbl_empleado ON 
tbl_cargo.EMP_ID = tbl_empleado.EMP_ID";
$result=mysqli_query($bd,$sql);

$pdf=new PDF();

$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFont("Arial","B", 15);
$pdf->Cell(35);
$pdf->Cell(120,10,"Reportes de Cargos",0,0,"C");
$pdf->ln(15);

$pdf->SetFillColor(232,232,232);
$pdf->SetFont("Times", "B", 10);
$pdf->Cell(33,7,"Identificador",1,0,"C",1);
$pdf->Cell(55,7,"Empleado",1,0,"C",1);
$pdf->Cell(35,7,"Departamento",1,0,"C",1);
$pdf->Cell(33,7,utf8_decode("Descripción"),1,0,"C",1);
$pdf->Cell(33,7,"Estado",1,1,"C",1);

$pdf->SetFont("Times","",10);

while($row=mysqli_fetch_assoc($result))
{
$pdf->Cell(33,7,$row['CAR_ID'],1,0,"C");
$pdf->Cell(55,7,$row['EMP_NOMBRES'],1,0,"C");
$pdf->Cell(35,7,$row['DEP_DESCRIPCION'],1,0,"C");
$pdf->Cell(33,7,$row['CAR_DESCRIPCION'],1,0,"C");
$pdf->Cell(33,7,$row['CAR_ESTADO'],1,1,"C");

}


$pdf->Output();
?>