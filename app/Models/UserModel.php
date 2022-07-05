<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'usuarios'; //la tabla mapeo
    protected $allowedFields = ['id', 'nombres', 'correo', 'clave', 'rol'];

    //listar todos los propietario o uno dado el id
    public function getData($id = null)
    {
        if ($id == null) {
            return $this->findAll(); // select * from propietarios
        }
        return $this->where('id', $id)->first(); // select * from propietarios where id=$d
    }

    public function getData2($userid = !null)
    {
        $userid = session()->get('userid');
        $this->select('id, nombres');
        // $this->from('usuarios');
        $this->where('id', $userid);
        return $this->findAll();
    }

    //Eliminar registro en la BD
    public function eliminar($id)
    {

        return $this->where('id', $id)->delete();
    }

    //Insertar en la BD
    public function guardar($datos)
    {
        return $this->insert($datos);
    }

    //Actualizar registro en la BD
    public function actualizar($id, $data)
    {
        return $this->update($id, $data);
    }

    public function validar($clave, $correo)
    {
        $condicional = array('correo' => $correo, 'clave' => $clave);
        return $this->where($condicional)->first();
    }
}
