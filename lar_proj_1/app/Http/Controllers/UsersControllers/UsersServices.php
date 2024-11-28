<?php

namespace App\Http\Controllers\UsersControllers;

require_once 'php/jdf.php';

use App\Http\Controllers\Controller;
use App\Mail\Email;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UsersServices extends Controller
{
    public function handleForgottenPassword(Request $input_request)
    {
        $input_request->validate(
            [
                'email' => 'required|max:49|exists:users,email',
            ],
        );
        try {
            $tempInputValue = $input_request['email'];
            $random_code = random_int(100000, 999999);
            session()->put('user_forgetting_id', $random_code);
            session()->put('user_forgetting_email', $tempInputValue);
            session()->put('frgt', 'r');
            Mail::to($tempInputValue)
                ->send(new Email($random_code, null, 2));
            return redirect('reset-password');
        } catch (Exception $e) {
            return redirect('error');
        }
    }
    public function updatePassword(Request $input_request)
    {
        $input_request->validate(
            [
                'sent_code' => 'required|max:6|min:6',
                'new_password' => 'required|min:8|max:49',
                'confirmed_password' => 'required|min:8|max:49|same:new_password',
            ],
        );
        if ((session('user_forgetting_id') == $input_request['sent_code'])) {
            $new_password = Hash::make($input_request['new_password']);
            User::where('email', '=', session('user_forgetting_email'))
                ->update(['password' => $new_password]);
            session()->forget('user_forgetting_id');
            session()->forget('user_forgetting_email');
            session()->forget('frgt');
            session()->forget('user_id');
            return redirect('user-login')->with('success_change_alert', 'رمز عبور شما با موفقیت تغییر یافت.');
        } else {
            return redirect('error');
        }
    }
}
