<?php

namespace App\Http\Controllers\Backend\Account;

use App\Http\Controllers\Controller;
use App\Models\Other_cost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class Other_costController extends Controller
{
    public function index(){

        $data['model'] = Other_cost::orderBy('id','DESC')->get();

        return view('Backend.Account.Other_cost.index' , $data);
    }



    public function create(){
     
        return view('Backend.Account.Other_cost.create');
    }


    public function store(Request $request){

        $model = new Other_cost();
        $model->amount = $request->amount;
        $model->date = date('Y-m-d',strtotime($request->date));

        //Check if Image is there

        if ($request->hasfile('image')) {

            $destination = 'uploads/cost_images/' . $model->image;

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
            $file->move('uploads/cost_images/', $filename);
            //Save the filename in the db
            $model->image = $filename;
        }
        $model->description = $request->description;
        $model->save();

        $notification = array(
            'message' => 'Other costs Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('other_cost.index')->with($notification);
    }


    public function edit($id)
    {

        $cost = Other_cost::find($id);

        return view('Backend.Account.Other_cost.edit', compact('cost'));
    }


    public function update(Request $request , $id)
    {

        $model = Other_cost::find($id);
        $model->amount = $request->amount;
        $model->date = date('Y-m-d', strtotime($request->date));

        //Check if Image is there

        if ($request->hasfile('image')) {

            $destination = 'uploads/cost_images/' . $model->image;

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
            $file->move('uploads/cost_images/', $filename);
            //Save the filename in the db
            $model->image = $filename;
        }
        $model->description = $request->description;
        $model->update();

        $notification = array(
            'message' => 'Other costs updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('other_cost.index')->with($notification);
    }


    public function destroy($id)
    {

        $model = Other_cost::find($id);

        if ($model) {

            $destination = 'uploads/cost_images/' . $model->image;
            // /Check if image exists in the destination folder
            if (File::exists($destination)) {
                // IF SO - DELETE
                File::delete($destination);
            }
          
            $model->delete();

            $notification = array(
                'message' => 'Other costs deleted Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('other_cost.index')->with($notification);

        } else {

            $notification = array(
                'message' => 'Record not found',
                'alert-type' => 'error'
            );
        }

       
    }
}
