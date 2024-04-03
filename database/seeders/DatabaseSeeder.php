<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Storage::deleteDirectory('public/posts');
        Storage::makeDirectory('public/posts');
        $this->call(UserSeeder::class);
        Category::factory(4)->create(); 
        Tag::factory(8)->create(); 
        $this->call(PostSeeder::class);
     

    }
}
