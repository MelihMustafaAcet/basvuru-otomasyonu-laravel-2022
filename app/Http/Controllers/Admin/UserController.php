<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userModel;

    public function __construct()
    {
     $this->userModel = new User();
    }

    public function users(){
        $users = $this->userModel->usersWithDetails();

        return view('admin.users')->with('users', $users);
    }

    public function userDetail($userId) {
        $user = $this->userModel->getUser($userId);

        return view('admin.userdetail')->with('user', $user);
    }
}
