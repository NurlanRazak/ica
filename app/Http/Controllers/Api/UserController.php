<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;

class UserController extends Controller
{

    use ApiResponser;

    public function info(Request $request)
    {
        $user = $request->user();

        return $this->success($user);
    }
}
