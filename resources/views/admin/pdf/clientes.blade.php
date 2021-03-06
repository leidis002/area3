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
	$pdf->Cell(26, 7, 'Nombre', 1, 0, 'C');
	$pdf->Cell(40, 7, 'Cedula', 1, 0, 'C');
	$pdf->Cell(46, 7, 'Telefono', 1, 0, 'C');
	$pdf->cell(35, 7, 'Proyecto Activo', 1, 1, 'C');

	foreach ($clients as $client) {
		$pdf->Cell(26, 7, $client->persona->razon, 1, 0, 'C');
		$pdf->Cell(40, 7, $client->persona->rif, 1, 0, 'C');
		$pdf->Cell(46, 7, $client->persona->telefono, 1, 0, 'C');
		if (count($client->proyects) == 0) {
			$pdf->cell(35, 7, 'No Aplica', 1, 1, 'C');
		} else {
			$pdf->cell(35, 7, $client->proyects->first()->name, 1, 1, 'C');
		}
	}

	$pdf->Output('D');
?>