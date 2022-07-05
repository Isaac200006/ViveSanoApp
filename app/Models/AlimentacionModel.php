<?php

namespace App\Models;

use CodeIgniter\Model;

class AlimentacionModel extends Model
{
    protected $table = 'alimentacion'; //la tabla mapeo
    protected $allowedFields = ['id', 'dias', 'alimento', 'descripcion', 'created', 'modified'];

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
