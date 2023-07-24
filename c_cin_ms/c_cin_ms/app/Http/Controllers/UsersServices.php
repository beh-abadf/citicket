<?php

namespace App\Http\Controllers;

require_once 'php/jdf.php';

use App\Http\Controllers\Controller;
use App\Mail\Email;
use App\Models\Member;
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
    //             'email' => 'required|max:49|unique:members',
    //             'pwd' => 'required|min:5|max:49',
    //             'pwda' => 'required|min:5|max:49'
    //         ]
    //     );
    //     try {
    //         if ($input_request['pwd'] == $input_request['pwda']) {
    //             Member::create([
    //                 'name' => $input_request['name'],
    //                 'email' => $input_request['email'],
    //                 'password' => Hash::make($input_request['pwd']),
    //                 'remember_token' => $input_request['_token'],
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
    //             'pwd' => 'required|min:5|max:49',
    //         ],
    //     );
    //     try {
    //         $row = Member::where('email', '=', $input_request['email']);
    //         $rowInfo = $row->get();
    //         if ($row->exists() && (Hash::check($input_request['pwd'], $rowInfo[0]->password))) {
    //             session()->put('user_id', $rowInfo[0]->id);
    //             $row->update([
    //                 'date_loged_in' => jdate('y/m/d'),
    //                 'day_loged_in' => jdate('l'),
    //                 'time_loged_in' => jdate('g:i:s'),
    //             ]);
    //             return redirect('/');
    //         } else {
    //             return redirect('error');
    //         }
    //     } catch (Exception $e) {
    //         return redirect('error');
    //     }
    // }
    // public function ForgettingPassword(Request $input_request)
    // {
    //     $input_request->validate(
    //         [
    //             'email' => 'required|max:49',
    //         ],
    //     );
    //     try {
    //         $rowInfo = Member::where('email', '=', $input_request['email']);
    //         if ($rowInfo->exists()) {
    //             $random_code = random_int(100000, 999999);
    //             session()->put('user_forgetting_id', $random_code);
    //             session()->put('user_forgetting_email', $input_request['email']);
    //             session()->put('frgt', 'r');
    //             Mail::to($input_request['email'])->send(new Email($random_code, null, 2));
    //             return redirect('resettingpassword');
    //         } else {
    //             return redirect('error');
    //         }
    //     } catch (Exception $e) {
    //         return redirect('error');
    //     }
    // }
    // public function ResettingPassword(Request $input_request)
    // {
    //     $validationVar = Validator::make(
    //         $input_request->all(),
    //         [
    //             'cd' => 'required|max:5|min:5',
    //             'npwd' => 'required|min:5|max:49',
    //             'pwda' => 'required|min:5|max:49',
    //         ],
    //         $this->ValidationSamples()
    //     );
    //     if (!$validationVar->passes()) {
    //         return response()->json(['result' => -1, 'error' => $validationVar->errors()]);
    //     } else {
    //         try {
    //             if ((session('user_forgetting_id') == $input_request['cd']) && ($input_request['pwda'] == $input_request['npwd'])) {
    //                 Member::where('email', '=', session('user_forgetting_email'))
    //                     ->update(['password' => $input_request['npwd']]);
    //                 session()->forget('user_forgetting_id');
    //                 session()->forget('user_forgetting_email');
    //                 session()->forget('frgt');
    //                 session()->forget('user_id');
    //                 return redirect('userlogin');
    //             } else {
    //                 return redirect('error');
    //             }
    //         } catch (Exception $e) {
    //             return redirect('error');
    //         }
    //     }
    // }
}
