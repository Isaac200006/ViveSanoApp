<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Controllers\Auth;

class HistoricoModel extends Model
{
    protected $table = 'historico_usuarios'; //la tabla mapeo
    protected $allowedFields = ['id', 'peso', 'estatura', 'imc', 'fecha', 'id_usuarios'];
    //listar todos los los registros de la latabla o uno dado el id
    public function getData($id = null)
    {
        if ($id == null) {
            return $this->findAll();
        }
        return $this->where('id', $id)->first();
    }

    public function getData2($userid = !null)
    {
        $userid = session()->get('userid');
        $this->select('historico_usuarios.id, historico_usuarios.peso, historico_usuarios.estatura, historico_usuarios.imc, historico_usuarios.fecha');
        $this->from('historico_usuarios', 'usuarios');
        $this->join('usuarios', 'historico_usuarios.id_usuarios = usuarios.id');
        $this->where('usuarios.id', $userid);
        return $this->findAll();
    }

    //--- eliminar----------
    public function eliminar($id)
    {
        return $this->where('id_usuarios', $id)->delete();
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