<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::create([
            'name'=>'noe',
            'email'=>'noeceron43@gmail.com',
            'password'=>bcrypt('123456789')
        ]);
       User::factory(9)->create();
    }
}
