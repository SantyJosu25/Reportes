<?php  
include '../fpdf/fpdf.php';

class PDF extends FPDF
{
function header()
{

$this->ln(25);

}

function footer()
{
$this->SetY(-15);
$this->SetFont("Arial","BI", 15);
$this->Cell(0,10,"Pagina ".$this->PageNo().'/{nb}',0,0,"C");
}
}
?>