<?php

use App\TypeSupport;
use Illuminate\Database\Seeder;

class TypeSupportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TypeSupport::create([
            'name' => 'VIDEO',
            'icon' => 'fas fa-film',
            'badge' => 'warning'
        ]);

        TypeSupport::create([
            'name' => 'ARCHIVO PDF - POWERPOINT - OTROS',
            'icon' => 'fas fa-paperclip',
            'badge' => 'secondary'
        ]);

        TypeSupport::create([
            'name' => 'IMAGEN',
            'icon' => 'far fa-images',
            'badge' => 'primary'
        ]);
    }
}
