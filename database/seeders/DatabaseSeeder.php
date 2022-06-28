<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BalconySeeder::class);
        $this->call(DistrictSeeder::class);
        $this->call(InternetSeeder::class);
        $this->call(RegionSeeder::class);
        $this->call(TypeBuildingSeeder::class);
        $this->call(TypeObject::class);

    }
}
