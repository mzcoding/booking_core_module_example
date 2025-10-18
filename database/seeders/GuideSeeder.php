<?php

declare(strict_types=1);

namespace Database\Seeders;

use Booking\Models\Guide;
use Illuminate\Database\Seeder;

final class GuideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Guide::factory(15)->create();
    }
}
