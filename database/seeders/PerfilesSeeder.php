<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Perfiles;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PerfilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $perfilUsuario = Perfiles::create([
            'nombre' => 'Administrador',
        ]);
        $perfilAdmin = Perfiles::create([
            'nombre' => 'Usuario',
        ]);
        $userUsuario = User::create([
            'name' => 'Usuario',
            'email' => 'usuario@gmail.com',
            'perfil_id' => 2,
            'telefono' => '1234567890',
            'direccion' => 'Calle 123',
            'password' => Hash::make('123456'),
        ]);
        $userAdmin = User::create([
            'name' => 'Administrador',
            'email' => 'admin@gmail.com',
            'perfil_id' => 1,
            'telefono' => '1234567890',
            'direccion' => 'Calle 123',
            'password' => Hash::make('123456'),
        ]);
        

    }
}
