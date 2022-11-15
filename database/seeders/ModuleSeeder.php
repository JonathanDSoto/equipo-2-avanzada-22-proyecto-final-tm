<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator;
use App\Models\module;
use Illuminate\Contracts\Mail\Attachable;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*         $table->string('name');
            $table->integer('priority');// maxima = 0, etc
            $table->string('role');
    //        $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('project_id');
 */

        $module = Module::create([
            'name' => 'Definicion de DML',
            'priority' => random_int(0,10),
            'project_id' => '1',
        ]);
        $module->save();

        $module = Module::create([
            'name' => 'Conexion a base de datos remota',
            'priority' => random_int(0,10),
            'project_id' => '1',
        ]);
        $module->save();

        $module = Module::create([
            'name' => 'Establecimiento de limites',
            'priority' => random_int(0,10),
            'project_id' => '2',
        ]);
        $module->save();
    
        $module = Module::create([
            'name' => 'Diseño de modulo de GPS',
            'priority' => random_int(0,10),
            'project_id' => '3',
        ]);
        $module->save();

        $module = Module::create([
            'name' => 'Diseño de placa base',
            'priority' => random_int(0,10),
            'project_id' => '3',
        ]);
        $module->save();

        $module = Module::create([
            'name' => 'Diseño de placa base',
            'priority' => random_int(0,10),
            'project_id' => '3',
        ]);
        $module->save();
    }
}
