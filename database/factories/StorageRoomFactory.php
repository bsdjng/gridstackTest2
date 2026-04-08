<?php

namespace gridstackTest2\database\factories;

use gridstackTest2\app\Models\StorageRoom;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class StorageRoomFactory extends Factory
{
    protected $model = StorageRoom::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
