<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Shifts extends Migration
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
			'shift_name' => [
				'type' => 'VARCHAR',
				'constraint' => 50
			]
		]);
		
		$this->forge->addPrimaryKey('id');
		$this->forge->createTable('shifts');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('shifts');
	}
}
