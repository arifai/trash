<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategoriesSeeder extends Seeder
{
	public function run()
	{
		$data = [
			[
				'category_name' => 'tajam',
				'category_desc' => ''
			], 
			[
				'category_name' => 'jerigen',
				'category_desc' => ''
			],
			[
				'category_name' => 'cair',
				'category_desc' => ''
			],
			[
				'category_name' => 'padat',
				'category_desc' => ''
			]
		];

		$this->db->table('categories')->insertBatch($data);
	}
}
