<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    static $region_first = [
        'Алматы р-н',
        'Есильский р-н',
        'р-н Байконур',
        'Сарыарка р-н'
    ];

    public function run()
    {
        foreach (self::$region_first as $rf) {
            DB::table('region')->insert([
                'name' => $rf,
                'city_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
