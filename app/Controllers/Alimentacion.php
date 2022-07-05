<?php

namespace App\Controllers;

use App\Models\AlimentacionModel; #usar el modelo
require_once APPPATH . 'Libraries/Pdf.php';
class Alimentacion extends BaseController
{
  protected $model;

  public function __construct()
  {
    $this->model = new AlimentacionModel(); //creando obj modelo 
  }

  public function index()
  {
    if (session()->get('userid')) {


      $data['registros'] = $this->model->getData();
      $data['titulo'] = 'Verificar imc';
      $data['contenido'] = 'rutina/alimentacion';
      return view('welcome_message', $data);
      //print_r($data['registros']);
    } else {
      return redirect()->to(site_url('auth/index'));
    }
  }

  public function alimentacion()
  {
    if (session()->get('userid')) {

      $data['registros'] = $this->model->getData();
      $data['titulo'] = 'Tabla de alimentacion';
      $data['contenido'] = 'rutina/tableAlimentacion';
      return view('welcome_message', $data);
      //print_r($data['registros']);
    } else {
      return redirect()->to(site_url('auth/index'));
    }
  }

  public function add()
  {
    $data = [
      'dias' => $this->request->getVar('dias'), //database ---> formulario
      'alimento' => $this->request->getVar('alimento'),
      'descripcion' => $this->request->getVar('descripcion'),
      'created' => date('Y-m-d H:i:s'),
      'modified' => date('Y-m-d H:i:s'),
      'id_datosUsuario' => $this->request->getVar('id_datosUsuario')
    ];

    $this->model->guardar($data);
    $db = \Config\Database::connect();
    if ($db->affectedRows() > 0) {
      $msg = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>¡Ok!</strong> Registro guardado.
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    } else {
      $msg = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>¡Error!</strong> No se pudo guardar.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    }
    echo $msg;
  }

  //---- retornar el registro dado un id
  public function getByid($id)
  {
    $data = $this->model->getData($id);
    echo json_encode($data);
  }

  public function actualizar()
  {

    $id = $this->request->getVar('idalimentacion');
    $data = [
      'dias' => $this->request->getVar('dias'), //database ---> formulario
      'alimento' => $this->request->getVar('alimento'),
      'descripcion' => $this->request->getVar('descripcion'),
      'created' => date('Y-m-d H:i:s'),
      'modified' => date('Y-m-d H:i:s'),
      'id_datosUsuario' => $this->request->getVar('id_datosUsuario')
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
    $msg = "registro eliminado";
    echo '<script type="text/javascript"> alert(".::. .' . $msg . ' ::.") </script>';
    return redirect()->to(site_url('alimentacion')); //redireccion para cargar
  }

  public function alimentacionpdf()
  {

    $pdf = new \Pdf('P', 'mm', 'Letter', true, 'UTF-8', false);;
    $pdf->Addpage(); //add una pagina
    $registros = $this->model->getData();
    $pdf->ln(20);
    $username = session()->get('username');
    $html = '
     
      <h4>Plan de alimentacion de: ' . $username . '</h4>
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
             <th>DIAS</th>
             <th>COMIDA</th>
             <th>DESCRIPCION</th>
         </tr>
      </thead>
      <tbody>';
    foreach ($registros as $row) {
      $html .= ' <tr>
              <td>' . $row['dias'] . '</td>
              <td>' . $row['alimento'] . '</td>
              <td>' . $row['descripcion'] . '</td>
            
          </tr>';
    }
    $html .= ' </tbody></table>';
    $pdf->writeHTML($html, true, false, true, false, '');
    $pdf->Output('Alimentacion_usuario.pdf', 'I');
    //exit();
    //$this->response->setHeader('Content-Type', 'application/pdf');
    $pdf->header("Content-type:application/pdf");
    //--- add al pdf

  }
}
