<?php  
include '../template/plantilla.php';
$bd=mysqli_connect('localhost', 'root', '', 'reportes_db');
$sql="select * from tbl_departamento";
$result=mysqli_query($bd,$sql);

$pdf=new PDF();

$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFont("Arial","B", 15);
$pdf->Cell(35);
$pdf->Cell(120,10,"Reportes de Departamentos",0,0,"C");
$pdf->ln(15);

$pdf->SetFillColor(232,232,232);
$pdf->SetFont("Times","B",10);
$pdf->Cell(63,7,"Identificador",1,0,"C",1);
$pdf->Cell(73,7,utf8_decode("Descripción"),1,0,"C",1);
$pdf->Cell(50,7,"Estado",1,1,"C",1);


$pdf->SetFont("Times","",10);

while($row=mysqli_fetch_assoc($result))
{
$pdf->Cell(63,7,$row['DEP_ID'],1,0,"C");
$pdf->Cell(73,7,$row['DEP_DESCRIPCION'],1,0,"C");
$pdf->Cell(50,7,$row['DEP_ESTADO'],1,1,"C");

}


$pdf->Output();
?>