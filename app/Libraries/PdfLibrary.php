<?php

namespace App\Libraries;

use TCPDF;

/**
 * Description of Pdf Library
 *
 * @author https://roytuts.com
 */
class PdfLibrary extends TCPDF
{

    function __construct()
    {
        parent::__construct();
    }

    //Page header
    public function Header()
    {
        // Set font
        $this->SetFont('helvetica', 'B', 20);
        // Title
        $this->SetX(55);
        $this->Cell(0, 2, 'Laporan Transaksi My Laundry', 0, 1, '', 0, '', 0);

        $style = array('width' => 0.50, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0));
        $this->Line(15, 18, 195, 18, $style);
    }

    // Page footer
    public function Footer()
    {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}
