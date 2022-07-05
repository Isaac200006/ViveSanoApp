<?php

namespace App\Controllers;

use App\Models\HistoricoModel; #usar el modelo
require_once APPPATH . 'Libraries/Pdf.php';
class Historico extends BaseController
{
  protected $model;

  public function __construct()
  {
    $this->model = new HistoricoModel(); //creando obj modelo 
  }

  public function index()
  {
    if (session()->get('userid')) {
      $data['registros'] = $this->model->getData2();
      $data['titulo'] = 'Verificar imc';
      $data['contenido'] = 'historico/imc';
      return view('welcome_message', $data);
    } else {
      return redirect()->to(site_url('auth/index'));
    }
    //print_r($data['registros']);
  }

  public function historico()
  {
    if (session()->get('userid')) {
      $username = (session()->get('username'));
      $data['registros'] = $this->model->getData2();
      $data['titulo'] = 'Historico de ' . $username . '';
      $data['contenido'] = 'historico/tableHistory';
      return view('welcome_message', $data);
    } else {
      return redirect()->to(site_url('auth/index'));
    }
    //print_r($data['registros']);
  }


  public function add()
  {
    $peso = $this->request->getVar('peso');
    $estatura = $this->request->getVar('estatura');
    $estatura2 = pow($estatura, 2);
    $imc = round($peso / $estatura2, 2);

    $data = [
      'peso' => $peso, //database ---> formulario
      'estatura' => $estatura,
      'imc' => $imc,
      'fecha' => date('Y-m-d H:i:s'),
      'id_usuarios' => $this->request->getVar('idusuarios')
    ];

    $this->model->guardar($data);
    $db = \Config\Database::connect();
    if ($db->affectedRows() > 0) {
    }

    if ($imc < 18.5) {
      echo '<script type="text/javascript"> alert("Tu IMC es de: ' . $imc . ' - Tu peso es insuficiente") 
      </script>';
    } else if ($imc >= 18.5 && $imc < 25) {
      echo '<script type="text/javascript"> alert("Tu IMC es de: ' . $imc . ' - Tu peso es normal") 
     </script>';
    } else if ($imc >= 25 && $imc < 30) {
      echo '<script type="text/javascript"> alert("Tu IMC es de: ' . $imc . ' - Tienes sobrepeso") 
   </script>';
    } else if ($imc >= 30 && $imc < 35) {
      echo '<script type="text/javascript"> alert("Tu IMC es de: ' . $imc . ' - Estas obeso")
  </script>';
    } else {
      echo '<script type="text/javascript"> alert("Tu IMC es de: ' . $imc . ' - Tienes un nivel de obesidad morbida") 
    
    </script>';
    }
  }

  public function getByid($id)
  {
    $data = $this->model->getData($id);
    echo json_encode($data);
  }

  public function actualizar()
  {

    $id = $this->request->getVar('idusuarios');
    $data = [
      'peso' => $this->request->getVar('peso'), //database ---> formulario
      'estatura' => $this->request->getVar('fecha'),
      'imc' => $this->request->getVar('fecha'),
      'fecha' => date('Y-m-d H:i:s'),
      'id_usuarios' => $this->request->getVar('idusuarios')
    ];

    $this->model->actualizar($id, $data);
    $db = \Config\Database::connect();
    if ($db->affectedRows() > 0) {
      $msg = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>¡Ok!</strong> Registro actualizado.
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    } else {
      $msg = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>¡Error!</strong> No se pudo actualizar.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    }
    echo $msg;
  }

  public function eliminar($id)
  {
    $this->model->eliminar($id);
    $msg = "Registro eliminado";
    echo '<script type="text/javascript"> alert(".::. .' . $msg . ' ::.") </script>';
    return redirect()->to(site_url('historicousuarios')); //redireccion para cargar
  }

  public function historicopdf()
  {
    $pdf = new \Pdf('P', 'mm', 'Letter', true, 'UTF-8', false);;
    $pdf->Addpage(); //add una pagina
    $registros = $this->model->getData2();
    $pdf->ln(20);
    $username = session()->get('username');
    $html = '
   
    <h4>Historico de: ' . $username . '</h4>
    <table table-bordered border="1">
    <thead >
    <style>
     th{
         text-align: center;
         font-family: freeserif;
         background-color:gray;
         
     }
     td{
      text-align: center;
      font-family: freeserif;

     }
     h4{
      text-align: center;
      font-family: freeserif;

     }

 </style>
       <tr>
           <th>ID</th>
           <th>PESO</th>
           <th>ALTURA</th>
           <th>IMC</th>
           <th>FECHA</th>

       </tr>
    </thead>
    <tbody>';
    foreach ($registros as $row) {
      $html .= ' <tr>
            <td>' . $row['id'] . '</td>
            <td>' . $row['peso'] . '</td>
            <td>' . $row['estatura'] . '</td>
            <td>' . $row['imc'] . '</td>
            <td>' . $row['fecha'] . '</td>
        </tr>';
    }
    $html .= ' </tbody></table>';
    $pdf->writeHTML($html, true, false, true, false, '');
    $pdf->Output('Historico_usuario.pdf', 'I');
    //exit();
    //$this->response->setHeader('Content-Type', 'application/pdf');
    $pdf->header("Content-type:application/pdf");
    //--- add al pdf
  }
}
