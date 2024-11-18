<?php

namespace App\Http\Controllers;

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
    // public function RegisterAUser(Request $input_request)
    // {
    //     $input_request->validate(
    //         [
    //             'name' => 'required|max:19|min:2',
    //             'email' => 'required|max:49|unique:users',
    //             '' => 'required|min:5|max:49',
    //             'a' => 'required|min:5|max:49'
    //         ]
    //     );
    //     try {
    //         if ($input_request[''] == $input_request['a']) {
    //             User::create([
    //                 'name' => $input_request['name'],
    //                 'email' => $input_request['email'],
    //                 'password' => Hash::make($input_request['']),
    //                 'reUser_token' => $input_request['_token'],
    //                 'date_registered' => jdate('y/m/d'),
    //                 'day_registered' => jdate('l'),
    //                 'time_registered' => jdate('g:i:s'),
    //             ]);
    //             return redirect('/');
    //         } else {
    //             return redirect('error');
    //         }
    //     } catch (Exception $e) {
    //         return redirect('error');
    //     }
    // }
    // public function Login(Request $input_request)
    // {
    //     $input_request->validate(
    //         [
    //             'email' => 'required|max:49',
    //             '' => 'required|min:5|max:49',
    //         ],
    //     );
    //     try {
    //         $row = User::where('email', '=', $input_request['email']);
    //         $rowInfo = $row->get();
    //         if ($row->exists() && (Hash::check($input_request[''], $rowInfo[0]->password))) {
    //             session()->put('user_id', $rowInfo[0]->id);
    //             $row->update([
    //                 'date_entered' => jdate('y/m/d'),
    //                 'day_entered' => jdate('l'),
    //                 'time_entered' => jdate('g:i:s'),
    //             ]);
    //             return redirect('/');
    //         } else {
    //             return redirect('error');
    //         }
    //     } catch (Exception $e) {
    //         return redirect('error');
    //     }
    // }
    public function HandleForgottenPassword(Request $input_request)
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
    public function UpdatePassword(Request $input_request)
    {
        $input_request->validate(
            [
                'sent_code' => 'required|max:6|min:6',
                'new_password' => 'required|min:8|max:49',
                'confirmed_password' => 'required|min:8|max:49|same:new_password',
            ],
        );
        // try {
        if ((session('user_forgetting_id') == $input_request['sent_code'])) {
            $new_password = Hash::make($input_request['new_password']);
            User::where('email', '=', session('user_forgetting_email'))
                ->update(['password' => $new_password]);
            session()->forget('user_forgetting_id');
            session()->forget('user_forgetting_email');
            session()->forget('frgt');
            session()->forget('user_id');
            return redirect('user-login');
        }
        //  else {
        //     return redirect('error');
        // }
        //  } catch (Exception $e) {
        //      return redirect('error');
        //  }
    }
}
