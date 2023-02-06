<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dati=[
            [
                "name"=>"Boolflix",
                "description"=>"Creazione di una copia della famosa app senza implementazione Db",
            ],
            [
                "name"=>"TipTap",
                "description"=>"Creazione di un gioco in js",
            ],
            [
                "name"=>"Facebool",
                "description"=>"Creazione del layout del famoso sito",
            ]
            ];
        foreach($dati as $dato){
            $project=new Project();
            $project->name=$dato["name"];
            $project->description=$dato["description"];
            $project->save();

        }
    }
}
