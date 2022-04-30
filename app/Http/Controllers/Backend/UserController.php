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

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', 'unique:users'],
        ]);

        $user = new User;
        $user->user_type = $request->user_type;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $notification = array(
            'message' => 'User Added Successfully',
            'alert-type' => 'success'
        );

        $user->save();

        return redirect()->route('view.users')->with($notification);
    }
}
