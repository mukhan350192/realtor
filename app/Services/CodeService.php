<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

/**
 * Class CodeService.
 */
class CodeService
{
    public function saveCode($phone)
    {
        $code = rand(1000,9999);
        DB::beginTransaction();
        $new = DB::table('sms_code')->insertGetId([
            'code' => $code,
            'phone' => $phone,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        if (!$new){
            $result['message'] = 'Попробуйте позже';
            $result['success'] = false;
            DB::rollBack();
        }else{
            $result['success'] = true;
            $result['code'] = $code;
        }
        DB::commit();
        return $result;
    }
}
