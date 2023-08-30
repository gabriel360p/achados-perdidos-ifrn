<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>"Jose Salustiano",
            'password'=>Hash::make('123123123'),
            'email'=>"jose.salustiano@escolar.ifrn.edu.br",
            'registration'=>202001,
        ]);
        
        User::create([
            'name'=>"Ellen Karinne",
            'password'=>Hash::make('123123123'),
            'email'=>"karinne.ellen@escolar.ifrn.edu.br",
            'registration'=>202002,
        ]);

        
        User::create([
            'name'=>"Gabriel Costa",
            'password'=>Hash::make('123123123'),
            'email'=>"gabriel.costa1@escolar.ifrn.edu.br",
            'registration'=>202003,
        ]);

        
        User::create([
            'name'=>"Ciro Morais",
            'password'=>Hash::make('123123123'),
            'email'=>"ciro.medeiro@escolar.ifrn.edu.br",
            'registration'=>202004,
        ]);
    }
}
