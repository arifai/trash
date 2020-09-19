<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategoriesSeeder extends Seeder
{
	public function run()
	{
		$data = [
			[
				'category_name' => 'plastik',
				'category_desc' => 'Jenis sampah anorganik yang tidak dapat diuraikan begitu saja butuh waktu bertahun - tahun untuk dapat diuraikan'
			], 
			[
				'category_name' => 'organik',
				'category_desc' => 'Sampah organik berasal dari makhluk hidup, baik manusia, hewan, maupun tumbuhan'
			],
			[
				'category_name' => 'cair',
				'category_desc' => 'Sampah air yang telah mengalami penurunan kualitas karena pengaruh manusia'
			],
			[
				'category_name' => 'padat',
				'category_desc' => 'Segala bahan buangan selain kotoran manusia, urine dan sampah cair'
			]
		];

		$this->db->table('categories')->insertBatch($data);
	}
}
