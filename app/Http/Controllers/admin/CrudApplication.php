<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\Auth;
use App\Models\admin\Crud;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class CrudApplication extends Controller
{


    public function index(){
        return view("admin/login");
    }

    public function submit (Request $request){

        $validator = validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if($validator->passes()){

            if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password] , $request->get('remember'))){

                $auth = Auth::guard("admin")->user();

                if($auth->role == 2){
                    $model['auth'] = $auth;
                    return redirect()->route('dashbord',$model)->with('success', 'Welcome To Dashboard');
                }
                else{

                    Auth::guard("admin")->logout();
                    return redirect()->route('admin.login')->with('error', 'You are not Authorised to assecc the admin panel');
                }

            }
            else{
                return redirect()->route('admin.login')->with('error', 'Email! and password! not match');
            }
        }
        else{
            return redirect()->route("admin.login")
            ->withErrors($validator)
            ->withInput($request->only('email'));
        }
    }



    public function form (){
        return view("admin/form");
    }
    public function dashboard() {

        $models = Crud::orderBy("id", "asc")
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

    public function logout(){
        Auth::guard("admin")->logout();
        return redirect()->route('admin.login')->with('error', 'Logout succefully');
    }

}
