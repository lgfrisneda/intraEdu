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
            'name' => 'Video',
            'icon' => 'fas fa-film',
            'badge' => 'primary'
        ]);

        TypeSupport::create([
            'name' => 'Archivo PDF - POWERPOINT - OTROS',
            'icon' => 'fas fa-paperclip',
            'badge' => 'info'
        ]);

        TypeSupport::create([
            'name' => 'Imágen',
            'icon' => 'far fa-images',
            'badge' => 'warning'
        ]);
    }
}
