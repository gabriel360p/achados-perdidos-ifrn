<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categorie;

class CategorieSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categorie::create([
            'name'=>'Material Escolar',
        ]);

        Categorie::create([
            'name'=>'Material Esportivo',
        ]);

        Categorie::create([
            'name'=>'Roupa',
        ]);

        Categorie::create([
            'name'=>'Material de Higiene',
        ]);

        Categorie::create([
            'name'=>'Calçado',
        ]);

        Categorie::create([
            'name'=>'Eletrônico',
        ]);

        Categorie::create([
            'name'=>'Diversos',
        ]);

    }
}
