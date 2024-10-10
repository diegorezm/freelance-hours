<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Project;
use App\Models\Proposal;
use ArrangePosition;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->count(50)->create();
        User::query()->inRandomOrder()->limit(10)->get()
            ->each(function (User $u) {
                $projects = Project::factory()->create(['created_by' => $u->id]);
                Proposal::factory()->count(fake()->numberBetween(4, 45))->create(['project_id' => $projects->id]);
                ArrangePosition::run($projects->id);
            });
    }
}
