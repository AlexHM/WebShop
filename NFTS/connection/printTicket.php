<?php
require('../libraries/fpdf/fpdf.php');
require("connection");
$queryChangeTable = "select * from user_products where email_user=:email";
$resultChangeTable = $db->prepare($queryChangeTable);
$resultChangeTable->bindValue(":email", $_COOKIE["cok_user_card"]);
$resultChangeTable->execute();
$headerQuery = "show columns from user_products";
$resultHeader = $db->prepare($headerQuery);
$resultHeader->execute();

class PDF extends FPDF
{
// Funcion encargado de realizar el encabezado
function Header()
{
// Logo
$this->Image('logo.jpg',10,-1,70);
$this->SetFont('Arial','B',13);
// Move to the right
$this->Cell(80);
// Title
$this->Cell(95,10,'Lista de Personal',1,0,'C');
// Line break
$this->Ln(20);
}
// Funcion pie de pagina
function Footer()
{
// Position at 1.5 cm from bottom
$this->SetY(-15);
// Arial italic 8
$this->SetFont('Arial','I',8);
// Page number
$this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$display_heading = array('idp'=>'ID', 'personal_nombre'=> 'Nombre', 'personal_edad'=> 'Edad','personal_salario'=> 'Salario','fecha'=> 'Fecha',);


$pdf = new PDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',12);
// Declaramos el ancho de las columnas
$w = array(15, 80, 20, 30,30);
//Declaramos el encabezado de la tabla
$pdf->Cell(15,12,'ID',1);
$pdf->Cell(80,12,'NOMBRE',1);
$pdf->Cell(20,12,'EDAD',1);
$pdf->Cell(30,12,'SALARIO',1);
$pdf->Cell(30,12,'FECHA',1);
$pdf->Ln();
$pdf->SetFont('Arial','',12);
//Mostramos el contenido de la tabla
foreach($result as $row)
{
$pdf->Cell($resultChangeTable[1],6,$row['id_product'],1);
$pdf->Cell($resultChangeTable[2],6,$row['name'],1);
$pdf->Cell($resultChangeTable[2],6,$row['email_user'],1);
$pdf->Cell($resultChangeTable[3],6,number_format($row['quantity']),1);
$pdf->Cell($resultChangeTable[3],6,number_format($row['price']),1);

$pdf->Ln();
}
$pdf->Output();
?>