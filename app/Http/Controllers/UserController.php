<?php

namespace App\Http\Controllers;

use App\Http\Requests\CodeRequest;
use App\Models\User;
use App\Repositories\InsertCodeRepository;
use App\Services\CodeService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function takeCode(CodeRequest $request, CodeService $service)
    {
        $code = $service->saveCode($request->input('phone'));
        return response()->json($code);
    }

    public function registration(Request $request)
    {
        $phone = $request->input('phone');
        $iin = $request->input('iin');
        $password = $request->input('password');
        $code = $request->input('code');
        $result['success'] = false;
        do {
            if (!$phone) {
                $result['message'] = 'Не передан телефон';
                break;
            }
            if (!$iin) {
                $result['message'] = 'Не передан иин';
                break;
            }
            if (!$password) {
                $result['message'] = 'Не передан пароль';
                break;
            }
            if (!$code) {
                $result['message'] = 'Не передан код';
                break;
            }
            $user = User::where('phone', $phone)->first();
            if (!$user) {
                $result['message'] = 'Пользователь зарегистирован';
                break;
            }
            $token = sha1(Str::random(64) . time());
            DB::beginTransaction();
            $user = User::create([
                'phone' => $phone,
                'password' => bcrypt($password),
                'iin' => $iin,
                'token' => $token,
            ]);
            if (!$user) {
                $result['message'] = 'Попробуйте позже';
                DB::rollBack();
                break;
            }
            DB::commit();
            $result['success'] = true;
            $result['token'] = $token;
        } while (false);
        return response()->json($result);
    }

    public function login(Request $request)
    {
        $phone = $request->input('phone');
        $password = $request->input('password');
        $result['success'] = false;
        do {
            if (!$phone){
                $result['message'] = 'Не передан телефон';
                break;
            }
            if (!$password){
                $result['message'] = 'Не передан пароль';
                break;
            }
            $user = User::where('phone',$phone)->first();
            if (!$user){
                $result['message'] = 'Неправильный логин или пароль';
                break;
            }
            if (!Hash::check($user->password,$password)){
                $result['message'] = 'Неправильный логин или пароль';
                break;
            }
            $token = sha1(Str::random(64,time()));
            $user->token = $token;
            $user->save();
            $result['success'] = true;
            $result['token'] = $token;
        } while (false);
        return response()->json($result);
    }


    public function test(Request $request){
        $photo = $request->file('photo');
        print_r($photo);
        print_r(base64_encode(file_get_contents($photo->path())));
    }
}
