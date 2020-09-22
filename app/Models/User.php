<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $table = 'users';

    protected $allowedFields = ['full_name', 'employee_id', 'password', 'role_level_id', 'register_time'];
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    /**
     * Untuk membuat hash dari kata sandi/password
     * dengan algo BCRYPT
     */
    private function passwordHash(array $data)
    {
        if (isset($data['data']['password'])) {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_BCRYPT);

            return $data;
        }
    }

    /**
     * Tindakan sebelum data dimasukkan
     */
    protected function beforeInsert(array $data)
    {
        $data = $this->passwordHash($data);

        return $data;
    }

    /**
     * Tindakan sebelum data diperbarui
     */
    protected function beforeUpdate(array $data)
    {
        $data = $this->passwordHash($data);

        return $data;
    }

    public function getData()
    {
        return $this->db->table('users')
            ->join('roles_level', 'roles_level.role_level_id = users.role_level_id')
            ->orderBy('user_id', 'ASC')->get()->getResultArray();
    }

    public function delData($id)
    {
        $this->db->table('users')->delete(['user_id' => $id]);
    }

    public function getDataById($id)
    {
        return $this->where(['user_id' => $id])->first();
    }

    public function updateData(int $id, array $data)
    {
        extract($data);

        $this->db->table('users')->where('user_id', $id)->update($data);
        // $this->db->table('users')->update($data);

        return true;
    }
}
