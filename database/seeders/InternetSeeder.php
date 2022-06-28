<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InternetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    static $internet = [
        'ADSL',
        'Проводной',
        'Оптика'
    ];

    public function run()
    {
        foreach (self::$internet as $i){
            DB::table('internet')->insert([
                'name' => $i,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
