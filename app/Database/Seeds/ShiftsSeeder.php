<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ShiftsSeeder extends Seeder
{
	public function run()
	{
		$data = [
			[
				'shift_name' => 'pagi'
			],
			[
				'shift_name' => 'siang'
			],
			[
				'shift_name' => 'malam'
			]
		];

		$this->db->table('shifts')->insertBatch($data);
	}
}
