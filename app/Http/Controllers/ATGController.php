<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Redirect;


class ATGController extends Controller
{
    //
  

    public function showData(Request $request){
        $request -> validate([
            'name'=>'required',
            'email'=>'required | email',
            'pincode'=>'required | min:6 | max:6',
        ]);

        $checker = User::where('email',$request->input('email'))->exists();
        $user = new User;

        if ($checker){

        return redirect::to('/')->with('errorMsg', "Email Address Already Present!!");   

        } else {

            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->pincode = $request ->input('pincode');
            $check = $user -> save();

            if($check == 1){
                return redirect::to('/')->with('message',"Data Inserted Successfully!!!");
            }else{
                return redirect::to('/')->with('errorMsg',"Something went wrong !!");
            }

        }
    }
}
