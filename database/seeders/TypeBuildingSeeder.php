<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeBuildingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    static $typeBuilding = [
        'кирпичный',
        'панельный',
        'монолитный',
        'иное'
    ];

    public function run()
    {
        foreach (self::$typeBuilding as $tb){
            DB::table('type_building')->insert([
               'name' => $tb,
               'created_at' => Carbon::now(),
               'updated_at' => Carbon::now(),
            ]);
        }
    }
}
