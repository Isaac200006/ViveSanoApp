<?php

namespace App\Controllers;

use App\Models\UserModel;

require_once APPPATH . 'Libraries/Pdf.php';
class Auth extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new UserModel(); //creando obj modelo 
    }

    public function index()
    {
        return view('auth/login');
    }

    public function index2()
    {

        if (session()->get('userid')) {
            $data['registros'] = $this->model->getData();
            $data['titulo'] = 'Listado de usuarios';
            $data['contenido'] = 'auth/tableUser';
            return view('welcome_message', $data);
        } else {
            return redirect()->to(site_url('auth/index'));
        }
    }

    public function registro()
    {
        return view('auth/registro');
    }

    public function guardar()
    {
        $clave = sha1($this->request->getVar('password')); //enctripta
        $data = [
            'nombres' => $this->request->getVar('nombre'),
            'correo' => $this->request->getVar('correo'),
            'clave' => $clave,
            'rol' => $this->request->getVar('rol'),
            'created' => date('Y-m-d H:i:s'),
            'modified' => date('Y-m-d H:i:s')
        ];
        $save = $this->model->guardar($data);
        if ($save) {
            return redirect()->to(site_url('auth/index'));
        } else {
            return redirect()->to(site_url('auth/registro'));
        }
    }

    public function add()
    {
        $clave = sha1($this->request->getVar('password')); //enctripta
        $data = [
            'nombres' => $this->request->getVar('nombre'),
            'correo' => $this->request->getVar('correo'),
            'clave' => $clave,
            'rol' => $this->request->getVar('rol'),
            'created' => date('Y-m-d H:i:s'),
            'modified' => date('Y-m-d H:i:s')
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

    public function login()
    {
        $clave = sha1($this->request->getVar('password')); //encrypta
        $correo = $this->request->getVar('correo');
        $user_info = $this->model->validar($clave, $correo);
        if ($user_info) {
            $user = $user_info['nombres'];
            $id = $user_info['id'];
            $rol = $user_info['rol'];
            //--- crear las variables de sesión----
            session()->set('userid', $id);
            session()->set('username', $user);
            session()->set('user', $correo);
            session()->set('rol', $rol);
            return redirect()->to(site_url('home/index')); //welcome_message
        } else {

            return redirect()->to(site_url('auth/index'));
            $msg = '<script type="text/javascript"> alert("Usuario y/o clave invalidos")
            </script>';
            echo $msg;
        }
    }


    public function logOut()
    {
        if (session()->has('userid')) {
            session()->remove('userid');
            session()->remove('username');
            session()->remove('user');
            return redirect()->to(site_url('auth/index'));
        }
    }

    public function eliminar($id)
    {
        $this->model->eliminar($id);
        $msg = "registro eliminado";
        echo '<script type="text/javascript"> alert(".::. .' . $msg . ' ::.") </script>';
        return redirect()->to(site_url('auth/index2')); //redireccion para cargar
    }

    //---- retornar el registro dado un id
    public function getByid($id)
    {
        $data = $this->model->getData($id);
        echo json_encode($data);
    }

    //-------------------- actualiar un registro ------------
    public function actualizar()
    {
        $id = $this->request->getVar('iduser');
        $clave = sha1($this->request->getVar('clave'));
        $data = [
            'nombres' => $this->request->getVar('nombres'),
            'correo' => $this->request->getVar('correo'),
            'clave' => $clave,
            'rol' => $this->request->getVar('rol'),
            'created' => date('Y-m-d H:i:s'),
            'modified' => date('Y-m-d H:i:s')
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

    public function adminpdf()
    {
        $pdf = new \Pdf('P', 'mm', 'Letter', true, 'UTF-8', false);;
        $pdf->Addpage(); //add una pagina
        $registros = $this->model->getData();
        $pdf->ln(20);
        $html = '
        <h4>Listado de usuarios</h4>
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
               <th>NOMBRE</th>
               <th>CORREO</th>
               <th>CLAVE</th>
               <th>ROL</th>


           </tr>
        </thead>
        <tbody>';
        foreach ($registros as $row) {
            $html .= ' <tr>
                <td>' . $row['id'] . '</td>
                <td>' . $row['nombres'] . '</td>
                <td>' . $row['correo'] . '</td>
                <td>' . $row['clave'] . '</td>
                <td>' . $row['rol'] . '</td>

              
            </tr>';
        }
        $html .= ' </tbody></table>';
        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->Output('Reporte_usuario.pdf', 'I');
        //exit();
        //$this->response->setHeader('Content-Type', 'application/pdf');
        $pdf->header("Content-type:application/pdf");
        //--- add al pdf

    }
}
