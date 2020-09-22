<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RolesLevelSeeder extends Seeder
{
	public function run()
	{
		$data = [
			[
				'role_level_id' => 1,
				'role_name' => 'admin'
			],
			[
				'role_level_id' => 2,
				'role_name' => 'employee'
			]
		];

		$this->db->table('roles_level')->insertBatch($data);
	}
}
