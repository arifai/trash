<?php

namespace App\Models;

use CodeIgniter\Model;

class Trash extends Model
{
    protected $table = 'trashes';

    protected $allowedFields = ['weight', 'category_id', 'floor_id', 'user_id', 'shift_id', 'entry_time'];

    public function getData()
    {
        return $this->db->table('trashes')
            ->join('categories', 'categories.id = trashes.category_id', 'LEFT')
            ->join('floors', 'floors.id = trashes.floor_id', 'LEFT')
            ->join('users', 'trashes.user_id = users.user_id', 'LEFT')
            ->join('shifts', 'shifts.id = trashes.shift_id', 'LEFT')
            ->select('trashes.*')
            ->select('categories.category_name')
            ->select('floors.floor_name')
            ->select('users.full_name')
            ->select('shifts.shift_name')
            ->orderBy('trashes.id', 'ASC')->get()->getResultArray();
    }

    public function delData(int $id)
    {
        return $this->db->table('trashes')->delete(['id' => $id]);
    }

    public function getDataById(int $id)
    {
        return $this->where(['id' => $id])->first();
    }

    public function updateData(int $id, array $data)
    {
        extract($data);

        $this->db->table('trashes')->where('id', $id)->update($data);

        return true;
    }
}
