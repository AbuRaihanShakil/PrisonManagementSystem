<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Prisoner;
use App\Tasks;
use App\Visitors;
use Auth;

class PagesController extends Controller
{
    public function allstaff(){
        $users = User::all()->where('role',0);
    

        return view('allstaffs',['staffs'=>$users]);
    }

    public function staff($id){
        if(Auth::id()==1){

            $user = User::find($id);
            return view('staffview',['staff'=>$user]);
        }
    }

    public function addPrisoner(){
        if(Auth::id()==1){
            return view('addPrisoner');
        }
    }

    public function allPrisoner(){
        $section=0;
        $cellno=0;
        if(Auth::id()==1){
        $prisoners = Prisoner::all()->where('release',0);
        return view('allPrisoners',['prisoners'=>$prisoners,'section'=>$section,'cellno'=>$cellno]);
        }
        else{
            $section=Auth::user()->section;
            $cellno=0;
            $prisoners = Prisoner::all()->where('release',0)->where('section',$section);
            return view('allPrisoners',['prisoners'=>$prisoners,'section'=>$section,'cellno'=>$cellno]);
        }
        
    }

    public function filter(Request $request){
        if(Auth::id()==1){
            $prisoners = Prisoner::all()->where('release',0);
            $section=$request->input('section');
            $cellno=$request->input('cellno');
            if($section==0 && $cellno==0){
                return redirect()->route('prisoner.show');
            }
            if($section!=0 && $cellno==0){
                $prisoners = $prisoners->where('section',$section);
            }
            if($section==0 && $cellno!=0){
                $prisoners = $prisoners->where('cellno',$cellno);
            }
            else if($section!=0 && $cellno!=0){
                $prisoners = $prisoners->where('section',$section)->where('cellno',$cellno);
            }
            
        }
        else{
            $section=Auth::user()->section;
            $cellno=$request->input('cellno');
            $prisoners =Prisoner::all()->where('release',0)->where('section',$section);
            if($cellno==0){
                return redirect()->route('prisoner.show');
            }
            
            $prisoners = $prisoners->where('cellno',$cellno);

            return view('allPrisoners',['prisoners'=>$prisoners,'section'=>$section,'cellno'=>$cellno]);
            
        }

        return view('allPrisoners',['prisoners'=>$prisoners,'section'=>$section,'cellno'=>$cellno]);
    }


    public function search(Request $request){
        $section=0;
        $cellno=0;
        if(Auth::user()->role!=1){
            $section=Auth::user()->section;
        }

        $search = $request->input('search');
        // dd($search);
    
        // Search in the title and body columns from the posts table
        if($search==null){
        if(Auth::user()->role==1){
        $prisoners = Prisoner::all()->where('release',0);
        return view('allPrisoners',['prisoners'=>$prisoners,'section'=>$section,'cellno'=>$cellno]);
        }
        else{
            $section = Auth::user()->section;
            $prisoners = Prisoner::all()->where('release',0)->where('section',$section);
            return view('allPrisoners',['prisoners'=>$prisoners,'section'=>$section,'cellno'=>$cellno]);
        }
        
            
        }

        if(Auth::user()->role==1){
            $prisoners = Prisoner::query()
            ->where('release',0)
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('nid', 'LIKE', "%{$search}%")
            ->get();
    
            return view('allPrisoners',['prisoners'=>$prisoners,'section'=>$section,'cellno'=>$cellno]);
        }
        else{
            $prisoners = Prisoner::query()
            ->where('release',0)
            ->where('section',$section)
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('nid', 'LIKE', "%{$search}%")
            ->get();
            return view('allPrisoners',['prisoners'=>$prisoners,'section'=>$section,'cellno'=>$cellno]);
        }

    }




    public function viewPrisoner($id){
        $prisoner = Prisoner::find($id);
        $completedTask= Tasks::all()->where('prisonerid',$id)->where('status',1);
        $failedTask= Tasks::all()->where('prisonerid',$id)->where('status',2);
        $completedTask=count($completedTask);
        $failedTask=count($failedTask);
        return view('prisonerview',['prisoner'=>$prisoner,'failedTask'=>$failedTask,'completedTask'=>$completedTask]);
    }


    public function addTask($id){
        $prisoner = Prisoner::find($id);
        $tasks=Tasks::all()->where('prisonerid',$id)->where('status',0);
        return view('addtasks',['prisoner'=>$prisoner,'tasks'=>$tasks]);
    }

    public function taskHistory($id){
        $prisoner = Prisoner::find($id);
        $tasks=Tasks::all()->where('prisonerid',$id)->where('status','!=',0);
        return view('taskHistory',['prisoner'=>$prisoner,'tasks'=>$tasks]);
    }

    public function addVisitor($id){
        $prisoner=Prisoner::find($id);
        $visitors = Visitors::all()->where('prisonerid',$id);
        return view('addVisitor',['id'=>$id,'visitors'=>$visitors,'prisoner'=>$prisoner]);
    }

    public function editPrisoner($id){
        if(Auth::user()->role==1){
            $prisoner = Prisoner::find($id);
            return view('editPrisoner',['prisoner'=>$prisoner]);
        }
    }



    public function allReleasePrisoner(){
        $section=0;
        $cellno=0;
        if(Auth::id()==1){
        $prisoners = Prisoner::all()->where('release',1);
        return view('releasedPrisoners',['prisoners'=>$prisoners,'section'=>$section,'cellno'=>$cellno]);
        }
        else{
            $section=Auth::user()->section;
            $cellno=0;
            $prisoners = Prisoner::all()->where('release',1);
            return view('releasedPrisoners',['prisoners'=>$prisoners,'section'=>$section,'cellno'=>$cellno]);
        }
        
    }

    public function releaseFilter(Request $request){
        if(Auth::id()==1){
            $prisoners = Prisoner::all()->where('release',1);
            $section=$request->input('section');
            $cellno=$request->input('cellno');
            if($section==0 && $cellno==0){
                return redirect()->route('releasedPrisoner.show');
            }
            if($section!=0 && $cellno==0){
                $prisoners = $prisoners->where('section',$section);
            }
            if($section==0 && $cellno!=0){
                $prisoners = $prisoners->where('cellno',$cellno);
            }
            else if($section!=0 && $cellno!=0){
                $prisoners = $prisoners->where('section',$section)->where('cellno',$cellno);
            }
            return view('releasedPrisoners',['prisoners'=>$prisoners,'section'=>$section,'cellno'=>$cellno]);
        }
    }







    public function searchHistory(Request $request){
        $section=0;
        $cellno=0;
        if(Auth::user()->role!=1){
            $section=Auth::user()->section;
        }

        $search = $request->input('search');
        // dd($search);
    
        // Search in the title and body columns from the posts table
        if($search==null){
        if(Auth::user()->role==1){
        $prisoners = Prisoner::all()->where('release',1);
        return view('releasedPrisoners',['prisoners'=>$prisoners,'section'=>$section,'cellno'=>$cellno]);
        }
        else{
            $section = Auth::user()->section;
            $prisoners = Prisoner::all()->where('release',1)->where('section',$section);
            return view('releasedPrisoners',['prisoners'=>$prisoners,'section'=>$section,'cellno'=>$cellno]);
        }
        
            
        }

        if(Auth::user()->role==1){
            $prisoners = Prisoner::query()
            ->where('release',1)
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('nid', 'LIKE', "%{$search}%")
            ->get();
    
            return view('releasedPrisoners',['prisoners'=>$prisoners,'section'=>$section,'cellno'=>$cellno]);
        }
        else{
            $prisoners = Prisoner::query()
            ->where('section',$section)
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('nid', 'LIKE', "%{$search}%")
            ->get();
            return view('releasedPrisoners',['prisoners'=>$prisoners,'section'=>$section,'cellno'=>$cellno]);
        }

    }






}
