<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use App\Models\User;

class UserController extends Controller
{

    use ApiResponser;

    public function info(Request $request)
    {
        $user = $request->user();
        $user = User::whereId($user->id)
            ->with(
                'position',
                'techminimums',
                'electrics',
                'earthens',
                'crans',
                'capacities',
                'firehazards',
                'firesaves',
                'gashazards',
                'labors',
                'methanols',
                'pressurevessels'
            )->first();

        return $this->success($user);
    }
}
