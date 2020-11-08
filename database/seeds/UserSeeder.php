<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@email.com',
            'password' => bcrypt('12345678')
        ]);

        User::create([
            'name' => 'Estudiante',
            'email' => 'estudiante@email.com',
            'password' => bcrypt('87654321')
        ]);

    }
}
