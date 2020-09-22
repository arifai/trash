<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class FloorsSeeder extends Seeder
{
	public function run()
	{
		$data = [
			[
				'floor_name' => 'lantai 1'
			],
			[
				'floor_name' => 'lantai 2'
			],
			[
				'floor_name' => 'lantai 3'
			],
		];

		$this->db->table('floors')->insertBatch($data);
	}
}
