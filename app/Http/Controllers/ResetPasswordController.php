<?php

namespace App\Http\Controllers;

use App\Models\Lembaga;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    public function ViewResetPasswd()
    {
        $data = Lembaga::all();
        return view('auth.requestReset', [
            'title' => 'reset password',
            'lembaga' => $data,
        ]);
    }
    public function SendResetPasswd(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:user',
        ]);

        $token = Str::random(64);
        DB::table('reset_password')->insert([
            // $request->only('email', 'token'),
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        Mail::send('email.forgetPassword', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });
        return back()->with('message', 'We have e-mailed your password reset link!');
    }
    public function ResetPasswdForm($token)
    {
        $data = Lembaga::all();
        return view('auth.resetpasswdform', [
            'title' => 'form reset',
            'token' => $token,
            'lembaga' => $data
        ]);
    }

    public function SendResetForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:user',
            'token' => 'required',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);
        $updatePassword = DB::table('reset_password')
            ->where([
                'email' => $request->email,
                'token' => $request->token
            ])
            ->first();

        if (!$updatePassword) {
            return back()->withInput()->with('error', 'Invalid token!');
        }
        User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);
        return redirect('/login');

        // DB::table('reset_password')->where(['email' => $request->email])->delete();
        // return redirect('/login')->with('message', 'Your password has been changed!');
    }
}
