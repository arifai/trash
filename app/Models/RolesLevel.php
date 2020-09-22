<?php

namespace App\Models;

use CodeIgniter\Model;

class RolesLevel extends Model
{
    protected $table = 'roles_level';

    public function getData()
    {
        return $this->db->table('roles_level')->get()->getResultArray();
    }
}
