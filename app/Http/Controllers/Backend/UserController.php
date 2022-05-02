<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users['users'] = User::where('user_type', 1)->get();
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
        $code = rand(0000, 9999);
        $user->user_type = 1;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = bcrypt($code);
        $user->code = $code;
        $user->save();

        $notification = array(
            'message' => 'User Added Successfully',
            'alert-type' => 'success'
        );



        return redirect()->route('view.users')->with($notification);
    }

    public function edit($id)
    {
        $user  = User::find($id);

        return view('Backend.User.edit', compact('user'));
    }


    public function update(Request $request, $id)
    {

        $user =  User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        $user->update();

        $notification = array(
            'message' => 'User Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('view.users')->with($notification);
    }

    public function destroy($id)
    {
        $user  = User::find($id);

        $user->delete();

        $notification = array(
            'message' => 'User Delete Successfully',
            'alert-type' => 'error'
        );

        return redirect()->route('view.users')->with($notification);
    }
}
