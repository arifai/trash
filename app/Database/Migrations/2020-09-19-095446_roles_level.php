<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RolesLevel extends Migration
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
			'role_level_id' => [
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => true,
			],
			'role_name' => [
				'type' => 'VARCHAR',
				'constraint' => 50,
			]
		]);

		$this->forge->addPrimaryKey('id');
		$this->forge->addUniqueKey('role_level_id');
		$this->forge->createTable('roles_level');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('roles_level');
	}
}
