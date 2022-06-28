<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BalconySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    static $balcony = [
        'Да',
        'Нет',
        'Лоджия'
    ];
    public function run()
    {
        foreach (self::$balcony as $b){
            DB::table('balcony')->insert([
               'name' => $b,
               'created_at' => Carbon::now(),
               'updated_at' => Carbon::now(),
            ]);
        }
    }
}
