<?php

namespace App\Http\Controllers;

use App\Models\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //関数を追記
    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $user = User::where('email', $email)->first();

        // Hash::check(今入力されたパスワード、DBに保存された暗号化済みのパスワード)
        if (!$user || !Hash::check($password, $user->password)) {
            return "Login Failed";
            //ユーザーがいない｜または｜DBのパスワードと合致していれば
            // throw ValidationException::withMessages([
            //     'email' => ['メールが違うか、パスワードが違うか'],
            // ]);
        }

        $token = $user->createToken('token')->plainTextToken;
        //tokenという名前で返す
        // return response()->json(compact('token'), 200);


        return response()->json([
            'token' => $user->createToken('authentication')->plainTextToken,
            'user' => $user
        ]);
        // return response()->json(['user' => request()->user()]);
    }
}
