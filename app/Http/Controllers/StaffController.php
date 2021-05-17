<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class StaffController extends Controller
{
    public function update($id,Request $request){
        $staff = User::find($id);
        if(Auth::id()==1){
            $staff->section=$request->input('section');
            $staff->save();
            return redirect()->route('show.staffs');
        }
        else{
            return 'unAuthorized Entry';
        }
    }
}
