<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
 
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
/*          $table->string('name');
            $table->string('username');
            $table->string('phone');
            $table->string('address');
            $table->integer('NSS')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('verify_code');
            $table->string('position');
            $table->float('salary');
            $table->date('hired'); */
        
            
        User::create([
            'name' => 'Joel Verdugo',
            'username' => '@joel17',
            'phone' => '6121903234',
            'address' => 'Calle 3 avenida del perro',
            'NSS' => '123123132',
            'email' => 'joel@gmail.com',
            'password' => Hash::make('123123'),
            'verify_code' => '1111',
            'position' => 'Programador',
            'salary' => '4000',
            'hired' => Carbon::now()->subYears(4)
        ]);

        User::create([
            'name' => 'Daniel Zamago',
            'username' => '@daniel32317',
            'phone' => '612123223',
            'address' => 'Calle 3 colonia los barriles',
            'NSS' => '12312132',
            'email' => 'damiel343@gmail.com',
            'password' => Hash::make('123123'),
            'verify_code' => '1111',
            'position' => 'Programador',
            'salary' => '4000',
            'hired' => Carbon::now()->subYears(4)
        ]);

        User::create([
            'name' => 'David Buenrostro',
            'username' => '@davidl32317',
            'phone' => '612120226',
            'address' => 'Calle 3 numero 3434',
            'NSS' => '1231230132',
            'email' => 'davis343@gmail.com',
            'password' => Hash::make('123123'),
            'verify_code' => '1111',
            'position' => 'Programador',
            'salary' => '4000',
            'hired' => Carbon::now()->subYears(4)
        ]);


    }
}
