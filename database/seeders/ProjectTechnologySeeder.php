<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class ProjectTechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = Project::all();
        $technologies = Technology::all();

        foreach($projects as $project){
            //la funzione random(rand(1, 3)) prende da 0 a 3 elementi casuali dalla collection di tecnologie 
            //pluck('id') mi restituisce solo i valori del campo id degli elementi seleizionati
             // toArray() inserisce tutti gli id in un normale array php che viene accettato dal metodo attach
            $randomTechnologies = $technologies->random(rand(0, 3))->pluck('id')->toArray();
            $project->technology()->attach($randomTechnologies);
        }

    }
}
