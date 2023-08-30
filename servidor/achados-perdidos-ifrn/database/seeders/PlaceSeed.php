<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Place;
class PlaceSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Place::create([
            'name'=>'Sala de Aula',
        ]);

        Place::create([
            'name'=>'Banheiro',
        ]);

        Place::create([
            'name'=>'Auditório',
        ]);

        Place::create([
            'name'=>'Cantina',
        ]);

        Place::create([
            'name'=>'Refeitório',
        ]);

        Place::create([
            'name'=>  'Laboratório de Informática',
        ]);

        Place::create([
            'name'=> 'Laboratório de Eletro',
        ]);

        Place::create([
            'name'=>    'Laboratório de Têxtil',
        ]);

        Place::create([
            'name'=>      'Laboratório de Vestuário',
        ]);

        Place::create([
            'name'=>     'Laboratório de Moda',
        ]);

        Place::create([
            'name'=>    'Biblioteca',
        ]);

        Place::create([
            'name'=>      'Ginásio',
        ]);


        Place::create([
            'name'=>     'Academia',
        ]);
        

        Place::create([
            'name'=>    'Banheiros de Banho',
        ]);


        Place::create([
            'name'=>    'Área de Descanso',
        ]);


        Place::create([
            'name'=>    'Laboratório de Informática',
        ]);

        
        Place::create([
            'name'=>    'Laboratório de Química',
        ]);

        
        Place::create([
            'name'=>    'Laboratório de Matemática',
        ]);


        Place::create([
            'name'=>    'Laboratório de Física',
        ]);


        Place::create([
            'name'=>    'Piscina',
        ]);


        Place::create([
            'name'=>   'Recepção',
        ]);

        
        Place::create([
            'name'=>    'Corredor',
        ]);


        Place::create([
            'name'=>   'Estacionamento',
        ]);

        Place::create([
            'name'=>    'Sala de Música',
        ]);

        Place::create([
            'name'=>    'Sala de Teatro',
        ]);

        Place::create([
            'name'=>  'Outro Lugar..',
        ]);
    }
}
