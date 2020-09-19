<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Floors extends Migration
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
			'floor_name' => [
				'type' => 'VARCHAR',
				'constraint' => 50
			]
		]);

		$this->forge->addPrimaryKey('id');
		$this->forge->createTable('floors');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('floors');
	}
}
