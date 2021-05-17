<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tasks;
use App\Prisoner;
use Auth;
class TaskController extends Controller
{
    public function storeTask(Request $request,$pid){
        $task = new Tasks();
        $task->task=$request->input('task');
        $task->points=$request->input('points');
        $task->prisonerid = $pid;
        $task->assignerid = Auth::id();
        $task->status=0;
        $task->save();
        return redirect()->route('add.task',$pid);
    }

    public function complete($id,$pid){
        $task = Tasks::find($id);
        $task->status=1;
        $prisoner = Prisoner::find($pid);
        $prisoner->points=$prisoner->points+$task->points;
        $prisoner->save();
        $task->save();
        return redirect()->route('add.task',$pid);
    }

    public function fail($id,$pid){
        $task = Tasks::find($id);
        $task->status=2;
        $prisoner = Prisoner::find($pid);
        $prisoner->points=$prisoner->points-$task->points;
        $prisoner->save();
        $task->save();
        return redirect()->route('add.task',$pid);
    }
}
