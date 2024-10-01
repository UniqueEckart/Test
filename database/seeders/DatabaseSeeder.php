<?php

namespace Database\Seeders;

use App\Models\ShiftDay;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\WorkArea;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        ShiftDay::create(["label" => "Freitag"]);
        ShiftDay::create(["label" => "Samstag"]);
        ShiftDay::create(["label" => "Sonntag"]);
        WorkArea::create(["label" => "Matsuri"]);
        WorkArea::create(["label" => "Backstage Helfer"]);
        WorkArea::create(["label" => "Kasse"]);
    }
}
