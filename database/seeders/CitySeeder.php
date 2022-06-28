<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    static $city = [
        'Весь Казахстан',
        'Нур-султан (Астана)',
        'Алматы',
        'Шымкент',
        'Акмолинская обл.',
        'Актюбинская обл.',
        'Алматинская обл.',
        'Атырауская обл.',
        'Восточно-Казахстанская обл.',
        'Жамбылская обл.',
        'Западно-Казахстанская обл.',
        'Карагандинская обл.',
        'Костанайская обл.',
        'Кызылординская обл.',
        'Мангистауская обл.',
        'Павлодарская обл.',
        'Северо-Казахстанская обл.',
        'Туркестанская обл.',
    ];
    public function run()
    {
        foreach (self::$city as $c){
            DB::table('city')->insert([
                'name' => $c,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
