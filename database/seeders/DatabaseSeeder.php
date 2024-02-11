<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Social;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create();
        Social::create([
            'name' => 'X (formarly Twitter)',
            'slug' => 'x',
            'base_url' => 'x.com',
        ]);
        Social::create([
            'name' => 'Facebook',
            'slug' => 'facebook',
            'base_url' => 'facebook.com',
        ]);
        Social::create([
            'name' => 'Instagram',
            'slug' => 'instagram',
            'base_url' => 'instagram.com',
        ]);
        Social::create([
            'name' => 'Github',
            'slug' => 'github',
            'base_url' => 'github.com',
        ]);
    }
}
