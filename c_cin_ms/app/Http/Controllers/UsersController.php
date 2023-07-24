<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    private $provinces;
    private $cities;
    private $places;
    private $news;
    private $orders;
    private $members;
    private $places_and_city;
    function __construct()
    {
        $this->members = User::all();
    }
    public function UsersAdmin()
    {
        return view('users_admin/users_admin', [
            'users' => $this->members
        ]);
    }
    public function DeleteAUser($id)
    {
        $rowHasBeenSelected = User::where('id', '=', $id);
        if ($rowHasBeenSelected->exists()) {
            $rowHasBeenSelected->delete();
            return redirect("usersadmin");
        }
        return redirect('error');
    }
}
