<?php

namespace gridstackTest2\database\seeders;

use gridstackTest2\app\Models\StorageRoom;
use gridstackTest2\app\Models\User;
use gridstackTest2\database\factories\StorageRoomFactory;
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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        StorageRoom::factory()->create([
            'name' => 'cel 1'
        ]);
        StorageRoom::factory()->create([
            'name' => 'cel 2'
        ]);
        StorageRoom::factory()->create([
            'name' => 'cel 3'
        ]);
        StorageRoom::factory()->create([
            'name' => 'cel 4'
        ]);
    }
}
