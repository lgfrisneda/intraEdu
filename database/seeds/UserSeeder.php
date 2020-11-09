<?php

use App\LevelUser;
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

        $estudiante = User::create([
            'name' => 'Estudiante',
            'email' => 'estudiante@email.com',
            'password' => bcrypt('87654321')
        ]);

        LevelUser::create([
            'level_id' => 1,
            'user_id' => $estudiante->id
        ]);

    }
}
