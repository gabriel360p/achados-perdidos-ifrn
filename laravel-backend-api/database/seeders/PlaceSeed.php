<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Place;

class PlaceSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Place::create([
            'name'=>"Banheiro"
        ]);

        Place::create([
            'name'=>"Auditório"
        ]);

        Place::create([
            'name'=>"Laboratório"
        ]);

        Place::create([
            'name'=>"Biblioteca"
        ]);

        Place::create([
            'name'=>"Sala de Aula"
        ]);

        Place::create([
            'name'=>"Cantina"
        ]);

        Place::create([
            'name'=>"Refeitório"
        ]);
    }
}
