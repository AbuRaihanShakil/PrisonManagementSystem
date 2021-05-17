<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Prisoner;
use Auth;
class PrisonerController extends Controller
{

    public function update(Request $request,$id){
        $prisoner = Prisoner::find($id);
        $prisoner->section=$request->input('section');
        $prisoner->cellno=$request->input('cellno');
        $prisoner->save();
        return redirect()->route('prisoner.show');
    }
    public function store(Request $request){
        $prisoner= new Prisoner();
        if($request->hasfile('pic')){
            $filenamewithExt=$request->file('pic')->getClientOriginalName();
            $filename =pathinfo($filenamewithExt, PATHINFO_FILENAME);
            $extension = $request->file('pic')->getClientOriginalExtension();
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            $path=$request->file('pic')->storeAs('public/uploads',$fileNameToStore);
            $prisoner->picture=$fileNameToStore;
        }
        else{
                 $prisoner->picture="Null";
        }

        $prisoner->name=$request->input('name');
        $prisoner->nid=$request->input('nid');
        $prisoner->caseid=$request->input('caseid');
        $prisoner->cellno=$request->input('cellno');
        $prisoner->section=$request->input('section');
        $prisoner->points=0;
        $prisoner->release=0;
        $prisoner->releaserid=0;
        $prisoner->save();
        return redirect()->route('prisoner.show');

    }

    public function prisonerRelease($id){
        $prisoner=Prisoner::find($id);
        if(Auth::id()==1){
            $prisoner->release=1;
            $prisoner->releaserid=Auth::id();
            $prisoner->save();
            
        }
        else{
            if($prisoner->section==Auth::user()->section){
                $prisoner->release=1;
                $prisoner->releaserid=Auth::id();
                $prisoner->save();
            }
            else{
                return 'UnAuthorized!';
            }
        }
        return redirect()->route('prisoner.show');
    }
}
