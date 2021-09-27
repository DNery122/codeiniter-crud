<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductosSeeder extends Seeder
{
    public function run()
    {   
        $this->db->table('productos')->truncate();
        $producto = model('Producto');
        for ($i=0; $i < 10; $i++) { 
            $producto -> insert([
                'nombre'        => static::faker()->name,
                'descripcion'   => static::faker()->text,
                'precio'        => static::faker()->numberBetween($min = 100, $max = 1000),
                'imagen'        => static::faker()->imageUrl($width = 640, $height = 480)
            ]);   
        }
    }
}
