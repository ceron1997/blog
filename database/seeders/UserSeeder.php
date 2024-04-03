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
            'name' => 'ceron 1997', 
            'email' => 'noeceron43@gmail.com', 
            'password' => bcrypt('123')
        ]); 
        User::factory(99)->create(); 
    }
}
