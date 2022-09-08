<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // $user = User::find(1);
        $user = $request->user();
        return response()->json(compact('user'), 200);
    }
}
