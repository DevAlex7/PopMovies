<?php
    require_once('../../Reports/PDF.php');
    
    $pdf = new PDF();
    $result = $pdf->LeerActores();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',12);

    foreach($result as $row){
        $pdf->SetFont('Arial','',12);

        $pdf->Cell(90,12,$row['Actorname'],1);
        $pdf->Cell(90,12,$row['Moviename'],1);
        $pdf->Ln();
    } 
    $pdf->Output();
?>