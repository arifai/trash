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
				'constraint' => '3,2'
			],
			'trash_category_id' => [
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
			'entry_time' => [
				'type' => 'DATETIME'
			]
		]);

		$this->forge->addPrimaryKey('id');
		$this->forge->addForeignKey('trash_category_id', 'categories', 'id', 'CASCADE', 'CASCADE');
		$this->forge->addForeignKey('floor_id', 'floors', 'id', 'CASCADE', 'CASCADE');
		$this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
		$this->forge->addForeignKey('shift_id', 'shifts', 'id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('trashes');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('trashes');
	}
}
