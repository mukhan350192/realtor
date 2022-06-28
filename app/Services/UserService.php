<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

/**
 * Class UserService.
 */
class UserService
{
    public function register($code, $phone, $iin, $password)
    {
        $result['success'] = false;
        $check = DB::table('sms_code')->where('code', $code)->where('phone', $phone)->first();
        if (!$check) {
            $result['message'] = 'Код не совпадает';
            return $result;
        }
        $token = sha1(Str::random(64) . time());
        DB::beginTransaction();
        $user = User::create([
            'phone' => $phone,
            'iin' => $iin,
            'password' => bcrypt($password),
            'token' => $token,
        ]);
        if (!$user) {
            $result['message'] = 'Попробуйте позже';
            DB::rollBack();
            return $result;
        }
        DB::commit();
        $result['success'] = true;
        $result['token'] = $token;
        return $result;
    }
}
