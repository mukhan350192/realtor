<?php

namespace App\Repositories;


use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class InsertCodeRepository.
 */
class InsertCodeRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        //return YourModel::class;
    }

    public function create(Request|array $request){
        $code = rand(1000,9999);
        DB::table('sms_code')->insertGetId([
           'phone' => $request->input('phone'),
           'code' => $code,
           'created_at' => Carbon::now(),
           'updated_at' => Carbon::now(),
        ]);
        return $code;
    }
}
