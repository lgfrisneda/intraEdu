<?php

use App\Level;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Level::create([
            'name' => 'Junior',
            'bg_color' => 'warning'
        ]);

        Level::create([
            'name' => 'Intermedio',
            'bg_color' => 'primary'
        ]);

        Level::create([
            'name' => 'Senior',
            'bg_color' => 'danger'
        ]);

        Level::create([
            'name' => 'Personalizado',
            'bg_color' => 'secondary'
        ]);
    }
}
