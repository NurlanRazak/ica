<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use App\Models\User;
use App\Models\VerificationToken;
use Illuminate\Support\Facades\Hash;
use App\Jobs\SendSmsJob;

class AuthController extends Controller
{
    use ApiResponser;

    protected function generateToken($phone)
    {
        return (string)rand(10 ** (config('lmservice_auth.verification_code_length') - 1), 10 ** config('lmservice_auth.verification_code_length') - 1);
    }

    public function login(Request $request)
    {
        $user = User::where('phone', $request->phone)->where('password', $request->password)->first();

        return $this->success([
            'token' => $token->user->createToken('API Token')->plainTextToken
        ]);
    }

    public function verifyPhone(Request $request)
    {
        $phone = $request->phone;
        $token = $request->token;

        $token = VerificationToken::where('phone', $phone)->where('token', $token)->first()
                                   ?? abort(404, trans('auth.token_not_found'));

       $token->user->update([
           'phone' => $phone,
       ]);
       $token->delete();

       return $this->success([
           'token' => $token->user->createToken('API Token')->plainTextToken
       ]);
    }
}
