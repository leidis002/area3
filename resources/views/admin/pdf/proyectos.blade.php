<?php
	class PDF extends Crabbly\FPDF\FPDF {
	   //Cabecera de página
	   function Header(){

	       	$this->Image(public_path()."/img/logo.png",10,10,20);

	      	$this->SetFont('Helvetica','B',11);

	      	$this->Cell(0, 2,'',0,2,'C');
	      	$this->Cell(0, 5,'Sistema de Gestion de Proyectos',0,2,'C');

	      	$this->Ln();
			$this->Ln(15);
	   }
	}

	$pdf = new PDF('P','mm','letter');
	$pdf->AddPage();
	$pdf->SetFont('Helvetica', 'B', 11);
	$pdf->Cell(26, 7, 'Nombre:', 1, 0, 'C');
	$pdf->Cell(40, 7, 'Fecha de Inicio:', 1, 0, 'C');
	$pdf->Cell(46, 7, 'Fecha de Finalizacion:', 1, 0, 'C');
	$pdf->cell(20, 7, 'Estatus', 1, 0, 'C');
	$pdf->Cell(26, 7, 'Tipo', 1, 0, 'C');
	$pdf->Cell(20, 7, 'Monto', 1, 0, 'C');
	$pdf->Cell(20, 7, 'Moneda', 1, 1, 'C');
	foreach ($proyects as $proyect) {
		$pdf->Cell(26, 7, $proyect->name, 1, 0, 'C');
		$pdf->Cell(40, 7, $proyect->start, 1, 0, 'C');
		$pdf->Cell(46, 7, $proyect->ending, 1, 0, 'C');
		$pdf->cell(20, 7, $proyect->status, 1, 0, 'C');
		$pdf->Cell(26, 7, $proyect->type, 1, 0, 'C');
		$pdf->Cell(20, 7, $proyect->cost, 1, 0, 'C');
		$pdf->Cell(20, 7, $proyect->coin, 1, 1, 'C');	
	}

	$pdf->Output('D');
?>