<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Tag::create(['name' => 'Urgent']);
        \App\Models\Tag::create(['name' => 'Work']);
        \App\Models\Tag::create(['name' => 'Personal']);
        \App\Models\Tag::create(['name' => 'Important']);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
