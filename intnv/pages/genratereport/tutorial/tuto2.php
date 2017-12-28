<?php
require('../fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
	// Logo
	//$this->Image('logo.png',40,6,30);
	// Arial bold 15
	$this->SetFont('Arial','B',15);
	// Move to the right
	$this->Cell(70);
	// Title
	$this->Cell(60,10,'Boat Report Analysis',1,0,'C');
	// Line break
	$this->Ln(20);
}

// Page footer
function Footer()
{
	// Position at 1.5 cm from bottom
	$this->SetY(-15);
	// Arial italic 8
	$this->SetFont('Arial','I',8);
	// Page number
	$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
//for($i=1;$i<=40;$i++)
$pdf->SetY(40);
$pdf->SetX(20);
$pdf->Cell(0,10,'Name of the Owner/Company :',0,1);
$pdf->SetX(20);
$pdf->Cell(0,10,'Boat Registration Number :',0,1);
$pdf->SetX(20);
$pdf->Cell(0,10,'RFID Tag Number Assigned: :',0,1);
$pdf->SetX(20);
$pdf->Cell(0,10,'From Time:',0,1);
$pdf->SetX(20);
$pdf->Cell(0,10,'To Time :',0,1);
$pdf->SetX(20);
$pdf->Cell(0,10,'Overall Behavior :',0,1);

$pdf->Output();
?>
