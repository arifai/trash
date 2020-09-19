<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class UserSeeder extends Seeder
{
	public function run()
	{
		$data = [
			'full_name' => 'Dummy Admin',
			'employee_id' => '12345678',
			'password' => '$2y$10$grtPuC6IlAtTMLIQs.dwoOzyt1UkVpifXmsWmpmLcWgb/26oq6zuC',
			'role_level_id' => 1,
			'register_time' => Time::now('Asia/Jakarta', 'en_US')
		];

		$this->db->table('users')->insert($data);
	}
}
