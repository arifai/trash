<?php

namespace App\Models;

use CodeIgniter\Model;

class Shift extends Model
{
    protected $table = 'shifts';

    public function getData()
    {
        return $this->db->table('shifts')->get()->getResultArray();
    }
}
