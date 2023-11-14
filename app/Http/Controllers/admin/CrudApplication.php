<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\Crud;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CrudApplication extends Controller
{
    public function index(){
        return view("admin/login");
    }
    public function submit (Request $request){
        echo "hello <br>";
        echo $request->email;

    }

    public function form (){
        return view("admin/form");
    }

    public function dashboard() {
        $models = Crud::orderBy("id", "asc")
                        // ->where("id", ">" , "1")
                        ->get();
        $data['models'] = $models;

        return view("admin.dashboard", $data);
    }
    public function data(Request $request){
        $name=trim($request->name);
        $phone= $request->phone;
        $email= $request->email;
        $country= $request->country;

        $model = new Crud();
        $model->Name = $name;
        $model->Phone = $phone;
        $model->Email = $email;
        $model->Country = $country;
        $model->save();

        return redirect()->route('dashbord')->with('success', 'Data saved successfully');

    }

    public function delete($id){
        $model = Crud::find($id);
        if (!$model) {
            return redirect()->route('dashbord')->with('error', 'Record not found');
        }
            $model->delete();

        return redirect()->route('dashbord')->with('success', 'Record deleted successfully');
    }

    public function edit($id){
        $models = Crud::where("id", $id)
                        ->first();
        if (!$models) {
            return redirect()->route('dashbord')->with('error', 'Record not found');
        }
        // echo "<pre>";
        // echo($models->Name);
        // die;
            $data['models'] = $models;
        return view("admin/edit", $data);
    }
    public function update(Request $request){
        $id = $request->id;
        $model = Crud::find($id);

        if (!$model) {
            return redirect()->route('dashbord')->with('error', 'Record not found');
        }
        $model->name = $request->name;
        $model->phone = $request->phone;
        $model->email = $request->email;
        $model->country = $request->country;
        $model->save();

        return redirect()->route('dashbord')->with('success', 'Record updated successfully');

    }

}
