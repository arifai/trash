<?php

namespace App\Models;

use CodeIgniter\Model;

class Floor extends Model
{
    protected $table = 'floors';

    public function getData()
    {
        return $this->db->table('floors')->get()->getResultArray();
    }
}
