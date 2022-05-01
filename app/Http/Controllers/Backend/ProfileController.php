<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function index()
    {
        // Authenticated user
        $id = Auth::user()->id;

        $user = User::find($id);

        return view('Backend.Profile.index', compact('user'));
    }
    public function edit()
    {
        // Authenticated user
        $id = Auth::user()->id;

        // Find
        $user = User::find($id);

        return view('Backend.Profile.edit', compact('user'));
    }
    public function store(Request $request)
    {
        // Find auth user
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->gender = $request->gender;

        //LOGIC - Delete from destination and upload a new image

        if ($request->hasfile('image')) {

            $destination = 'uploads/user_images/' . $user->image;

            // /Check if image exists in the destination folder
            if (File::exists($destination)) {

                // IF SO - DELETE
                File::delete($destination);
            }

            //PROCEED WITH THE UPLOAD
            $file = $request->file('image');
            // get file extension
            $filename = time() . '.' . $file->getClientOriginalExtension();
            //Use move() to upload the file in the uploads folder
            //Takes 2 parameters - ( location , filename )
            $file->move('uploads/user_images/', $filename);
            //Save the filename in the db
            $user->image = $filename;
        }
        $user->save();

        $notification = array(
            'message' => 'User Profile Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('view.profile')->with($notification);

        return view('Backend.Profile.edit', compact('user'));
    }
}
