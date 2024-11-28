<?php

namespace App\Http\Controllers\UsersControllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    private $users;
    function __construct()
    {
        $this->users = User::all();
    }
    public function UsersAdmin()
    {
        return view('users_admin/users_admin', [
            'users' => $this->users
        ]);
    }
    public function deleteAUser(User $user)
    {
        $user->delete();
        return redirect("users-admin");
    }
}
