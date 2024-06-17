<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Appraisal;
use App\Models\SeoContact;
use App\Models\SeoLading;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Setting;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//        ServiceCategory::factory(5)->create();
       // Service::factory(50)->create();
//        SeoLading::factory(1)->create();
//        SeoContact::factory(1)->create();
//        Appraisal::factory(5)->create();
//         \App\Models\User::factory(1)->create();
        Setting::factory(1)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
