<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    static $district_second = [
        'мкр Комсомольский',
        'мкр Пригородный',
        'мкр Уркер'
    ];

    public function run()
    {
        foreach (self::$district_second as $ds){
            DB::table('district')->insert([
               'name' => $ds,
               'region_id' => 2,
               'created_at' => Carbon::now(),
               'updated_at' => Carbon::now(),
            ]);
        }
    }
}
