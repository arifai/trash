<?php

namespace App\Models;

use CodeIgniter\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function getData()
    {
        return $this->db->table('categories')->get()->getResultArray();
    }
}
