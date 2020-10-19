<?php

namespace App\Models;

use CodeIgniter\Model;

class Trash extends Model
{
    protected $table = 'trashes';

    protected $allowedFields = ['weight', 'category_id', 'floor_id', 'user_id', 'shift_id', 'is_out', 'entry_time'];

    /**
     * Mengambil data berdasarkan id dari `trashes.is_out`
     */
    public function getData(int $id)
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
            ->where('trashes.is_out', $id)
            ->orderBy('trashes.id', 'ASC')
            ->get()->getResultArray();
    }

    /**
     * Hapus data berdasarkan `id`
     */
    public function delData(int $id)
    {
        return $this->db->table('trashes')->delete(['id' => $id]);
    }

    /**
     * Mengambil data berdasarkan `id`
     */
    public function getDataById(int $id)
    {
        return $this->where(['id' => $id])->first();
    }

    /**
     * Method untuk keperluan update data
     */
    public function updateData(int $id, array $data)
    {
        extract($data);

        $this->db->table('trashes')->where('id', $id)->update($data);

        return true;
    }

    /**
     * Menghitung sampah keluar berdasarkan `is_out`
     */
    public function countIsOut(int $id)
    {
        return $this->db->table('trashes')->where('is_out', $id)->countAllResults();
    }

    /**
     * Menjumlahkan berat berdasarkan `category_id` dan `is_out`
     */
    public function sumWeighById(int $cat_id, int $is_out)
    {
        return $this->selectSum('weight')->where(['category_id' => $cat_id, 'is_out' => $is_out])->get()->getResultArray();
    }

    /**
     * Get result trash by grouping result by date
     */
    public function history()
    {
        return $this->db->table('trashes')
            ->join('categories', 'categories.id = trashes.category_id', 'LEFT')
            ->select('trashes.category_id, DATE(entry_time) AS dates, SUM(weight) AS weight')
            ->select('categories.category_name')
            ->groupBy('DATE(entry_time)')
            ->get()->getResultArray();

        // $gas = $this->db->table('trashes')->select('DATE(entry_time) AS dates, SUM(weight) AS weight');
        // $sel = $gas->groupBy('DATE(entry_time)')->get()->getResultArray();

        // return $sel;
    }
}
