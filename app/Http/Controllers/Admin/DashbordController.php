<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class DashbordController extends Controller
{
    //
    public function registerd()
    {
         $users = User::all();
         return view('admin.register')->with('users',$users);
    }
    public function registerdedit(Request $request,$id)
    {
          $users = User::findOrFail($id);
         return view('admin.register-edit')->with('users',$users);
    }
    public function registerdupdate(Request $request,$id)
    {
          $users = User::find($id);
          $users->name = $request->input('username');
          $users->usertype = $request->input('usertype');
          $users->update();
        return redirect('/role-register')->with('success','Your record have been updates sussfully');

    }
    public function registerddelete(Request $request,$id)
    {
          $users = User::findOrFail($id);

          $users->delete();
        return redirect('/role-register')->with('success','Your record have been deleted sussfully');

    }
}
