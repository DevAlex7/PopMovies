<?php
require_once('../../Reports/PDF.php');
date_default_timezone_set('America/El_Salvador');
class myPDF extends PDF {

    function header(){
        $this->SetFillColor(39,95,186);
        //Footer 263
        $this->Rect(0, 0, 220, 40, 'F');
        $this->Image('../../resources/public/img/Movietime.png',10,6,-200);
        $this->Ln(1);
        $this->SetFont('Arial','B',14);
        $this->Cell(276, 5, 'Favoritos por parte de los usuarios',0,0,'C');
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
        $this->Cell(15,10,'Likes',1,0,'C');
        $this->Cell(95,10,'Pelicula',1,0,'C');
        $this->Ln();
    }

    function viewTable(){
        $this->SetFont('Times','',12);
        $result = $this->LeerFavoritos();
        foreach($result as $row){
            $this->Cell(15, 10, $row['trendingTotal'], 1 ,'L',false);
            $this->MultiCell(95, 10, $row['name'], 1 ,'L',false);
            $this->Ln();
        }
    }
}

    $pdf = new myPDF('P','mm','Letter');
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->headerTable();
    $pdf->viewTable();
    $pdf->Output();
?>