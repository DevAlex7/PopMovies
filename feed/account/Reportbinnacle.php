<?php 
require_once('../../Reports/PDF.php');

date_default_timezone_set('America/El_Salvador');
class myPDF extends PDF {

    function header(){
        $this->SetFillColor(39,95,186);
        //Footer 263
        $this->Rect(0, 0, 320, 40, 'F');
        $this->Image('../../resources/public/img/Movietime.png',10,6,-200);
        $this->Ln(1);
        $this->SetFont('Arial','B',14);
        $this->Cell(276, 5, 'Actividades administrativas',0,0,'C');
        $this->Ln();
        $this->SetFont('Times','',12);
        $this->Cell(276, 10, 'PopMovies derechos reservados',0,0,'C');
        $this->Cell(276, 10, 'Fecha'.date('d:m:y'),0,0,'C');
        $this->Ln(30);
    }

    function footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','',8);
        $this->Cell(0,10,'page'.$this->PageNo().'/{nb}',0,0,'C');
    }

    function headerTable(){
        $this->Cell(54, 10, 'Fecha: '.$date = date('m/d/Y h:i:s a', time()),0,0,'C');
        $this->Cell(54, 10, 'Usuario: '.$_SESSION['AdminUsername'],0,0,'C');
        $this->Cell(54, 10, 'Nombre: '.$_SESSION['AdminName']." ".$_SESSION['AdminLastname'],0,0,'C');
        $this->Ln(20);
        $this->SetFont('Times','B',12);
        $this->Cell(25,10,'Fecha',1,0,'C');
        $this->Cell(30,10,'Usuario',1,0,'C');
        $this->Cell(30,10,'Sitio',1,0,'C');
        $this->Cell(100,10,utf8_decode('Acción'),1,0,'C');
        $this->Ln();
    }

    function viewTable(){
        $this->SetFont('Times','',12);
        $result = $this->LeerBitacora();
        foreach($result as $row){
            $this->Cell(25, 10, $row['date'], 0 ,'L',false);
            $this->Cell(30, 10, $row['adminUser'], 0 ,'L',false);
            $this->Cell(30, 10, $row['site'], 0 ,'L',false);
            $this->MultiCell(100, 10, utf8_decode($row['actionperformed']), 0 ,'L',false);
            $this->Ln();
        }
    }
}

    $pdf = new myPDF('p','mm','Letter');
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->headerTable();
    $pdf->viewTable();
    $pdf->Output();
?>