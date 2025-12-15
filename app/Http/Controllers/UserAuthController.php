<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;

use function Pest\Laravel\session;

class UserAuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function loginSubmit(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $user = UserModel::where('email', $email)
        ->where('password', $password)
        ->where('is_active', true)
        ->first();

        // session([
        //     'custom_user_id' => $user->email,
        // ]);

        if($user)
        {
            return redirect()->route('dashboard');
        }
    }

     public function logout(Request $request)
    {
        // Custom logout logic here
        $request->session()->forget('custom_user_id');
        $request->session()->flush();

        return redirect()->route('auth.login')->with('success', 'Logged out successfully!');
    }
}
