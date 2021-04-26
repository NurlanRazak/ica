<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use App\Models\User;
use App\Models\VerificationToken;
use Illuminate\Support\Facades\Hash;
use App\Jobs\SendSmsJob;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    use ApiResponser;

    public function login(Request $request)
    {
        $user = User::where('phone', $request->phone)->first();
        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return $this->success([
            'token' => $user->createToken('API Token')->plainTextToken
        ]);
    }
}
