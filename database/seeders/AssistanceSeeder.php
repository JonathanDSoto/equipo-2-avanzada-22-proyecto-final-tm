<?php

namespace Database\Seeders;

use App\Models\Assistance;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssistanceSeeder extends Seeder
{
    /*            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
                $table->date('out_time')->nullable(); */
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $assistance = Assistance::create([
            'user_id' => '1',
            'out_time' => Carbon::now()->addHours(13) 
        ]);


        $assistance = Assistance::create([
            'user_id' => '1',
            'created_at' => Carbon::now()->addDay(),
            'out_time' => Carbon::now()->addDay()->addHours(3) 
        ]);


        $assistance = Assistance::create([
            'user_id' => '2',
            'out_time' => Carbon::now()->addHours(8) 
        ]);


        $assistance = Assistance::create([
            'user_id' => '2',
            'created_at' => Carbon::now()->addDay(),
            'out_time' => Carbon::now()->addDay()->addHours(3) 
        ]);

        $assistance = Assistance::create([
            'user_id' => '3',
            'created_at' => Carbon::now()->addDay(),
            'out_time' => Carbon::now()->addDay()->addHours(3) 
        ]);
    }
}
