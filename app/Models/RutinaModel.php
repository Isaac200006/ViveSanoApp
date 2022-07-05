<?php

namespace App\Models;

use CodeIgniter\Model;

class RutinaModel extends Model
{
    protected $table = 'rutina'; //la tabla mapeo
    protected $allowedFields = ['id', 'dias', 'rutina', 'ejercicio', 'serie', 'id_historico'];

    //listar todos los los registros de la latabla o uno dado el id
    public function getData($id = null)
    {
        if ($id == null) {
            return $this->findAll();
        }
        return $this->where('id', $id)->first();
    }

    //--- eliminar----------
    public function eliminar($id)
    {
        return $this->where('id', $id)->delete();
    }

    //---- Insertar en BD----------------
    public function guardar($datos)
    {
        return $this->insert($datos);
    }

    public function actualizar($id, $data)
    {
        return $this->update($id, $data);
    }
}//endClass
