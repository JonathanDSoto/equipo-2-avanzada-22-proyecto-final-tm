<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /*            $table->stirng('name');
            $table->string('description');
            $table->string('company');
            $table->string('leader')->nullable();
            $table->integer('user_amount')->nullable();
            $table->integer('budget');
            $table->string('status');
            $table->date('start_date');
            $table->date('end_date'); */
       $project = new Project([
            'name' => "Giga DB",
            'description' => "Motor de base de datos desarrollado con html y css",
            'company' => "Oracle Inc",
            'leader' => "Jose Hernandez",
            'user_amount' => random_int(1,10),
            'budget' => random_int(0,5000000),
            'status' => 'en revision',
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addMonths(3)

        ]);
        $project->save(); 
        //

        $project = new Project([
            'name' => "Proto Integer",
            'description' => "El departamento de matematicas dedica sus esfuerzos a descubrir un numero entre el 5 y 6",
            'company' => "Universidad Autonoma de Baja Califoria Sus",
            'leader' => "Nelson Olachea",
            'user_amount' => random_int(1,10),
            'budget' => random_int(0,5000000),
            'status' => 'Aprobado',
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addMonths(3)

        ]);
        $project->save(); 

        //

        $project = new Project([
            'name' => "Bus Location Finder",
            'description' => "Sistema de seguimiento geografico de autobuses desarrollado con Java. Idea original de Cesar Chavez",
            'company' => "Insituto Tecnologico de La Pez",
            'leader' => "Francisco Marquez",
            'user_amount' => random_int(1,10),
            'budget' => random_int(0,5000000),
            'status' => 'Aprobado',
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addMonths(3)

        ]);
        $project->save();

        $project = new Project([
            'name' => "Presupuesto para las vacaciones del jefe de departamento de sistemas",
            'description' => "psum dolor sit amet, consectetur adipiscing elit, sed do enim id est laborum.",
            'company' => "Universidad Autonoma de Baja Califoria Sus",
            'leader' => "Nelson Olachea",
            'user_amount' => random_int(1,10),
            'budget' => random_int(0,5000000),
            'status' => 'Aprobado',
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addMonths(3)

        ]);
        $project->save(); 
    }
}
