<?php
//use App\libraries\TCPDF\tcpdf;
require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';

class Pdf extends \TCPDF
{
    function __construct()
    {
        parent::__construct();
    }
    public function Header()
    {
        // Logo
        //$image_file = K_PATH_MAIN.'logo_gastos.png';
        //$image_file = base_url('/assets/img/').'logo_gastos.png';
        //$this->Image($image_file, 15, 2, 20, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font

        $this->SetFont('freeserif', 'B', 11);
        // Title
        
        $this->Ln(10); //Salto de linea
        $this->Cell(0, 5, 'SISTEMA DE GESTIÓN DE USUARIOS', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $this->SetFont('freeserif', 'I', 10);
        $this->Ln(); //Salto de linea
        $this->Cell(0, 5, 'Barranquilla - Atlantico', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $this->Ln(); //Salto de linea
        $this->Cell(0, 5, 'Tel: (+57)3002515123', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $this->Ln(); //Salto de linea
        $this->Cell(0, 5, 'vivesano@gmail.com', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    // Page footer
    public function Footer()
    {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('freeserif', 'I', 9);
        // Page number

        // $user='Isaac Navarro';
        $user = session()->get('username');
        $fecha = date('d-m-Y H:i');
        $texto = 'Fecha de impresión:' . $fecha . ' impreso por: ' . $user;
        $this->Cell(0, 10, $texto . ' Pág. ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}
