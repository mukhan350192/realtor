<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeObject extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    static $addition = [
        'квартира',
        'частный дом',
        'участок',
        'общежите'
    ];
    public function run()
    {
        foreach (self::$addition as $c){
            DB::table('type_object')->insert([
                'name' => $c,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
