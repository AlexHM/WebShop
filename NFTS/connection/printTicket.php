<?php
require('mysql_table.php');

class PDF extends PDF_MySQL_Table
{
function Header()
{
    $this->Image('../media/logo.png',18,15,22);

    // Title
    $this->SetFont('Arial','B',18);
    $this->SetXY(47, 10);
    $this->Cell(40, 15, 'ENFFY', 0, 1, 'L', false);
    /* --- Cell --- */
    $this->SetFont('Arial','B',10);
    $this->SetXY(47, 23);
    $this->Cell(0, 4, 'CIF/NIF:', 0, 1, 'L', false);
    /* --- Cell --- */
    $this->SetFont('Arial','',10);
    $this->SetXY(70, 23);
    $this->Cell(0, 4, 'XXXXXXXXXX', 0, 1, 'L', false);
    $this->Ln(10);


    /* --- Cell --- */
    $this->SetFont('Arial','B',10);
    $this->SetXY(47, 28);
    $this->Cell(0, 4, 'EMAIL:', 0, 1, 'L', false);
    /* --- Cell --- */
    $this->SetFont('Arial','',10);
    $this->SetXY(70, 28);
    $this->Cell(0, 4, 'Shoprecipe@enffysupport.com', 0, 1, 'L', false);
    $this->Ln(10);


    /* --- Cell --- */
    $this->SetFont('Arial','B',10);
    $this->SetXY(47, 33);
    $this->Cell(0, 4, 'COUNTRY:', 0, 1, 'L', false);
    /* --- Cell --- */
    $this->SetFont('Arial','',10);
    $this->SetXY(70, 33);
    $this->Cell(0, 4, 'Spain, Madrid', 0, 1, 'L', false);
    $this->Ln(10);


    // Ensure table header is printed
    parent::Header();
}
}

// Connect to database
$link = mysqli_connect('localhost','root','','webstore5');

$pdf = new PDF();
$pdf->AddPage();
// First table: output all columns

/* --- Line --- */
$pdf->Line(10, 45, 200, 45);
/* --- Ln --- */
$pdf->SetY(41);
$pdf->Ln(20);
$pdf->Table($link,'select * from user_products order by price');

$pdf->Output();
?>