<?php

namespace App\Validations;

use App\Models\User;

class UserRules
{
    public function validateUser(string $text, string $fields, array $data)
    {
        $model = new User();
        $user = $model->where('employee_id', $data['employee_id'])->first();

        if (!$user) {
            return false;
        }

        return password_verify($data['password'], $user['password']);
    }
}
