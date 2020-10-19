<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Trashes extends Migration
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
			'weight' => [
				'type' => 'DECIMAL',
				'constraint' => '6,2'
			],
			'category_id' => [
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => true
			],
			'floor_id' => [
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => true
			],
			'user_id' => [
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => true
			],
			'shift_id' => [
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => true
			],
			'is_out' => [
				'type' => 'BOOLEAN'
			],
			'entry_time' => [
				'type' => 'DATE'
			]
		]);

		$this->forge->addPrimaryKey('id');
		$this->forge->addForeignKey('category_id', 'categories', 'id', 'CASCADE', 'CASCADE');
		$this->forge->addForeignKey('floor_id', 'floors', 'id', 'CASCADE', 'CASCADE');
		$this->forge->addForeignKey('user_id', 'users', 'user_id', 'CASCADE', 'CASCADE');
		$this->forge->addForeignKey('shift_id', 'shifts', 'id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('trashes');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('trashes');
	}
}
