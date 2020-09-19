<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Categories extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => true,
				'auto_increment' => true
			],
			'category_name' => [
				'type' => 'VARCHAR',
				'constraint' => 100
			],
			'category_desc' => [
				'type' => 'TEXT',
				'null' => true
			]
		]);
		
		$this->forge->addPrimaryKey('id');
		$this->forge->createTable('categories');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('categories');
	}
}
