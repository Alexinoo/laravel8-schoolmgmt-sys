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
        $user->user_type = $request->input('user_type');
        $user->name = $request->input('name');
        $user->email = $request->input('email');
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
