<?php
require('genratereport/fpdf.php');
require('config.php');

function convertformat($dt)
	{

		$a = date('D', strtotime($dt));
		$m = date('M', strtotime($dt));
		//echo $a ;
		//echo " " ;
		//echo $m ;
		//echo " " ;
		//echo substr($dt,0,2);
		//echo " " ;
		//echo substr($dt,11);
		//echo " " ;
		 substr($dt,6,5);
		//echo $returnfrom;
		$returnvalue=$a." ".$m." ".substr($dt,0,2)." ".substr($dt,11)." ".substr($dt,6,5);
		//echo $returnvalue;
		return $returnvalue;
}
$arrcount=array();
$durationarr=array();


$rfid_no=$_GET['no'];
$from=convertformat($_GET['from']);
$to=convertformat($_GET['to']);
//$test="HollyCross Water Transport Ltd.";
$query = "SELECT * FROM rtls,company where company.rfid_tag_assigned=rtls.rfid_no and rfid_no='".$rfid_no."' and time BETWEEN '".$from."' and '".$to."'";
	$queryres = mysqli_query($conn, $query);
	while($row = mysqli_fetch_assoc($queryres))
	{
	$rfid = $row['rfid_no'];
	$time = $row['time'];
	$count = $row['count'];

	$duration=$row['duration'];
	$company_name=$row['company_name'];
	$boat_registration_no=$row['boat_registration_no'];
			if($count!=0)
			{
				 $arrcount[]=$count;
				 $durationarr[]=$duration;
			}
	}

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

if(empty($arrcount) && empty($durationarr))
{
echo "Data insufficient in the database to be displayed...";
}
else
{

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
//for($i=1;$i<=40;$i++)
$pdf->SetY(40);
$pdf->SetX(20);
$pdf->Cell(0,10,'Name of the Owner/Company :'.$company_name,0,1);
$pdf->SetX(20);
$pdf->Cell(0,10,'Boat Registration Number :'.$boat_registration_no,0,1);
$pdf->SetX(20);
$pdf->Cell(0,10,'RFID Tag Number Assigned:'.$rfid_no,0,1);
$pdf->SetX(20);
$pdf->Cell(0,10,'From Time:'.$from,0,1);
$pdf->SetX(20);
$pdf->Cell(0,10,'To Time :'.$to,0,1);
$pdf->SetX(20);
$pdf->Cell(0,10,'Overall Behavior :',0,1);
$pdf->setX(20);
$pdf->Cell(0,10,'The boat showed violation for '.sizeOf($arrcount).' times. The largest duration was '.max($durationarr).' sec and smallest duration was '.min($durationarr).'sec');
$pdf->Output();
}
?>

