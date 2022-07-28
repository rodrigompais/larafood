<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'      => 'Rodrigo de Menezes Pais',
            'email'     => 'rodrigo.pais.28@gmail.com',
            'password'  => bcrypt('12345678'),
        ]);
    }
}
