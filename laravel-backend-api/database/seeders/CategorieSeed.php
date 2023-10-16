<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categorie;

class CategorieSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categorie::create([
            'name'=>"Material Escolar"
        ]);

        Categorie::create([
            'name'=>"Eletrônico"
        ]);

        Categorie::create([
            'name'=>"Roupa"
        ]);

        Categorie::create([
            'name'=>"Comida"
        ]);

        Categorie::create([
            'name'=>"Acessório"
        ]);

        Categorie::create([
            'name'=>"Diversos"
        ]);
    }
}
