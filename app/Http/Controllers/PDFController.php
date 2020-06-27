<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Codedge\Fpdf\Fpdf\Fpdf;

class PDFController extends Controller
{
    private $fpdf;

    public function __construct()
    {

    }


    // Public function judul($teks1, $teks2, $teks3, $teks4, $teks5){
    //     $this->Cell(25);
    //     $this->SetFont(‘Times’,’B’,’12’);
    //     $this->Cell(0,5,$teks1,0,1,’C’);
    //     $this->Cell(25);
    //     $this->Cell(0,5,$teks2,0,1,’C’);
    //     $this->Cell(25);
    //     $this->SetFont(‘Times’,’B’,’15’);
    //     $this->Cell(0,5,$teks3,0,1,’C’);
    //     $this->Cell(25);
    //     $this->SetFont(‘Times’,’I’,’8′);
    //     $this->Cell(0,5,$teks4,0,1,’C’);
    //     $this->Cell(25);
    //     $this->Cell(0,2,$teks5,0,1,’C’);
    //     }

    public function kop_header()
    {

    }

    public function createPDF()
    {
        $this->fpdf = new Fpdf;
        $this->fpdf->AddPage();
        $this->fpdf->SetFont('Courier', 'B', 18);
        $this->fpdf->Text(10, 10, "Hello FPDF");

        $this->fpdf->Output();
        exit;
    }
}
