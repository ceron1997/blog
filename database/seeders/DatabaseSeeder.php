<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Seeder;
//use Illuminate\Support\Facades\Storage; En la version 10 hay problemas al usar Storage
use Illuminate\Support\Facades\File;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Storage::makeDirectory('posts');
        //Borrar la carpeta "posts"
        File::deleteDirectory(public_path('storage/posts'));
        //crear la carpeta "posts"
        File::makeDirectory(public_path('storage/posts'), 0777, true);

        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        Category::factory(4)->create();
        Tag::factory(8)->create();
        $this->call(PostSeeder::class);
    }
}
