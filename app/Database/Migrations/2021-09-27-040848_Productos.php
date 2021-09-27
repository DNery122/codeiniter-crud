<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Productos extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                    'type'           => 'INT',
                    'constraint'     => 5,
                    'unsigned'       => true,
                    'auto_increment' => true,
            ],
            'nombre'       => [
                    'type'          => 'VARCHAR',
                    'constraint'    => '100',
            ],
            'descripcion' => [
                    'type'          => 'TEXT',
                    'constraint'    => '100',
                    'null'          => true
            ],
            'precio'    => [
                    'type'          => 'FLOAT',
                    'constraint'    =>  5.2,
                    'unsigned'      => false
            ],
            'imagen'    => [
                    'type'          => 'VARCHAR',
                    'constraint'    => '255'
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('productos');
    }

    public function down()
    {
        $this->forge->dropTable('blog');
    }
}
