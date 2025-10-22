<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FollowerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            $followersIds = $users
                ->where('id', '!=', $user->id)
                ->random(random_int(0, 3))
                ->pluck('id');

            $user->followers()->sync($followersIds);
        }
    }
}
