<?php  
include '../template/plantilla.php';
$bd=mysqli_connect('localhost', 'root', '', 'reportes_db');
$sql="select * from tbl_empleado";
$result=mysqli_query($bd,$sql);

$pdf=new PDF();

$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFont("Arial","B", 15);
$pdf->Cell(35);
$pdf->Cell(120,10,"Reportes de Empleados",0,0,"C");
$pdf->ln(15);

$pdf->SetFillColor(232,232,232);
$pdf->SetFont("Times","B",10);
$pdf->Cell(33,7,"Identificador",1,0,"C",1);
$pdf->Cell(73,7,"Nombres",1,0,"C",1);
$pdf->Cell(50,7,"Documento de Identidad",1,0,"C",1);
$pdf->Cell(33,7,"Estado",1,1,"C",1);

$pdf->SetFont("Times","",10);

while($row=mysqli_fetch_assoc($result))
{
$pdf->Cell(33,7,$row['EMP_ID'],1,0,"C");
$pdf->Cell(73,7,$row['EMP_NOMBRES'],1,0,"C");
$pdf->Cell(50,7,$row['EMP_DNI'],1,0,"C");
$pdf->Cell(33,7,$row['EMP_ESTADO'],1,1,"C");
}


$pdf->Output();
?>