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
}
