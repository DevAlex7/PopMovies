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
        $this->Cell(276, 5, 'Factura de compra',0,0,'C');
        $this->Ln();
        $this->SetFont('Times','',12);
        $this->Cell(276, 10, 'PopMovies derechos reservados',0,0,'C');
        $this->Ln(30);
    }

    function footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','',8);
        $this->Cell(0,10,'page'.$this->PageNo().'/{nb}',0,0,'C');
    }

    function headerTable(){
        $this->Cell(54, 10, 'Fecha: '.$date = date('m/d/Y h:i:s a', time()),0,0,'C');
        $this->Cell(54, 10, 'Usuario: '.$_SESSION['ClientUsername'],0,0,'C');
        $this->Cell(54, 10, 'Nombre: '.$_SESSION['ClientName']." ".$_SESSION['ClientLastName'],0,0,'C');
        $this->Ln(20);
        $this->SetFont('Times','B',12);
        $this->Cell(20,10,'Cantidad',1,0,'C');
        $this->Cell(30,10,'Precio',1,0,'C');
        $this->Cell(30,10,utf8_decode('Fecha'),1,0,'C');
        $this->Cell(30,10,utf8_decode('Estado'),1,0,'C');
        $this->Cell(60,10,'Pelicula',1,0,'C');
        $this->Ln();
    }

    function viewTable(){
        $this->SetFont('Times','',12);
        $result = $this->obtenerListadeCompra();
        $total = $this->obtenerTotalCarrito();
        foreach($result as $row){
            $this->Cell(20, 10, $row['count'], 0 ,'L',false);
            $this->Cell(30, 10, $row['price'], 0 ,'L',false);
            $this->Cell(30, 10, $row['date'], 0 ,'L',false);
            $this->Cell(30, 10, $row['status'], 0 ,'L',false);
            $this->MultiCell(60, 10, utf8_decode($row['name']), 0 ,'L',false);    
        }
        $this->Ln(2);
        $this->Cell(60,10,'Su total es: '.$total['resultado'],1,0,'C');
        
    }
}

    $pdf = new myPDF('p','mm','Letter');
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->headerTable();
    $pdf->viewTable();
    $pdf->Output();
?>