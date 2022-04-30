<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users['users'] = User::all();
        return view('Backend.User.index', $users);
    }
    public function create()
    {

        return view('Backend.User.create');
    }
}
