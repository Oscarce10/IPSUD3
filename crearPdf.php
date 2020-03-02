<?php 
require ('modelos/fpdf/fpdf.php');
session_start();


// cd D:\xampp\htdocs\IPSUD3\modelos\fpdf\font
//php D:\xampp\htdocs\IPSUD3\modelos\fpdf\makefont\makefont.php Montserrat-Regular.ttf

class MyPdf extends FPDF{
	function Header() {
		$this->AddFont('Lexend', "", 'LexendDeca-Regular.php');
		$this->SetFont('Lexend',"", 16);
		$this->Image("img/heartbeat.png");
		$this->Cell(276,5,"IPSUD",0,0,"C");
		$this->Ln();
		$this->Cell(276,10,"Resultado de pacientes filtrados",0,0,"C");
		$this->Ln(20);
	}
	
	function Footer() {
		$this->SetY(-15);
		$this->Cell(0, 10, $this->PageNo() . '/{nb}', 0, 0, "R");
		$this->AliasNbPages();
	}
	
	function headerTable() {
		$this->Cell(20 ,10 ,"ID" , 1, 0, "C");
		$this->Cell(47 ,10 ,"Nombre" , 1, 0, "C");
		$this->Cell(47 ,10 ,"Apellido" , 1, 0, "C");
		$this->Cell(47 ,10 ,"Cedula" , 1, 0, "C");
		$this->Cell(47 ,10 ,"Correo" , 1, 0, "C");
		$this->Cell(20 ,10 ,"Estado" , 1, 0, "C");
		$this->Cell(47 ,10 ,"Foto" , 1, 0, "C");
		$this->Ln();
		
	}
	
	function viewTable() {
		$pacientes = unserialize($_SESSION["pacientes"]);
		foreach ( $pacientes as $p ) {
			$this->Cell(20 ,10 , $p->getId() , 1, 0, "C");
			$this->Cell(47 ,10 , $p->getNombre(), 1, 0, "C");
			$this->Cell(47 ,10 , $p->getApellido()  , 1, 0, "C");
			$this->Cell(47 ,10 , $p->getCedula() , 1, 0, "C");
			$this->Cell(47 ,10 , $p->getCorreo() , 1, 0, "C");
			$this->Cell(20 ,10 , include "verImagen.php?loc=" . base64_encode("img/".($p->getEstado () == 1)?"check.svg":"times.svg") . "&h=10&w=20" , 1, 0, "C");
			$this->Cell(47 ,10 , include "verImagen.php?loc=" . base64_encode($p->getFoto ()). "&h=10&w=47", 1, 0, "C");
			$this->Ln();
		}
	}
}
$pdf = new MyPdf("L");

$pdf->AddFont('Roboto', "", 'Roboto-Regular.php');
$pdf->SetFont('Roboto',"", 16);
$pdf->AddPage();
$pdf->headerTable();
$pdf->viewTable();
$pdf->Output();
?>