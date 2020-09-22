<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'user_id' => [
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => true,
				'auto_increment' => true
			],
			'full_name' => [
				'type' => 'VARCHAR',
				'constraint' => 50
			],
			'employee_id' => [
				'type' => 'INT',
				'constraint' => 8,
				'unsigned' => true
			],
			'password' => [
				'type' => 'VARCHAR',
				'constraint' => 100
			],
			'role_level_id' => [
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => true
			],
			'register_time' => [
				'type' => 'DATETIME'
			]
		]);

		$this->forge->addPrimaryKey('user_id');
		$this->forge->addUniqueKey('employee_id');
		$this->forge->addForeignKey('role_level_id', 'roles_level', 'role_level_id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('users');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('users');
	}
}
