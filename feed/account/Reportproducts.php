<?php
require_once('../../Reports/PDF.php');

class myPDF extends PDF {

    function header(){
        $this->SetFillColor(39,95,186);
        //Footer 263
        $this->Rect(0, 0, 320, 40, 'F');
        $this->Image('../../resources/public/img/Movietime.png',10,6,-200);
        $this->Ln(1);
        $this->SetFont('Arial','B',14);
        $this->Cell(276, -10, 'Informe de existencia',0,0,'C');
        $this->Ln();
        $this->SetFont('Times','',12);
        $this->Cell(276, 25, 'PopMovies derechos reservados',0,0,'C');
        $this->Ln(40);
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
        $this->Cell(16,10,'Codigo',1,0,'C');
        $this->Cell(50,10,'Nombre',1,0,'C');
        $this->Cell(15,10, utf8_decode('Año') ,1,0,'C');
        $this->Cell(16,10,'Precio',1,0,'C');
        $this->Cell(19,10,'Cantidad',1,0,'C');
        $this->Cell(115,10,'Sipnosis',1,0,'C');
        $this->Ln();
    }

    function viewTable(){
        $this->SetFont('Times','',12);
        $result = $this->LeerProductos();
        foreach($result as $row){
            $this->Cell(16,10,$row['id'],1,0,'L');
            $this->Cell(50, 10, utf8_decode($row['name']), 1 ,'L',false);
            $this->Cell(15,10,$row['year'],1,0,'L');
            $this->Cell(16,10,$row['price'],1,0,'L');
            $this->Cell(19,10,$row['count'],1,0,'L');
            $this->MultiCell(115, 10, utf8_decode($row['sinopsis']), 1 ,'L',false);
            $this->Ln();
        }
    }
}

    $pdf = new myPDF('l','mm','Letter');
    $pdf->SetMargins(25,25,25);
    $pdf->SetAutoPageBreak(true, 25);
    $pdf->AliasNbPages();
    $pdf->AddPage(0);
    $pdf->headerTable();
    $pdf->viewTable();
    $pdf->Output();
?>