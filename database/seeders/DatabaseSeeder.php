<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserTableSeeder::class);
        Admin::create([
            'name' => 'Tony Stark',
            'email' => 'tony@marvel.com',
            'password' =>bcrypt('jarvis')
        ]);
    }
}
