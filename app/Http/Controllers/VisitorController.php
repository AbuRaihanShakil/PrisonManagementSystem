<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Visitors;
class VisitorController extends Controller
{
    public function storeVisitore(Request $request,$id){
        $visitor = new Visitors();
        $visitor->name=$request->input('name');
        $visitor->nid=$request->input('nid');
        $visitor->relation=$request->input('relation');
        $visitor->phone=$request->input('phone');
        $visitor->prisonerid=$id;
        $visitor->save();
        return redirect()->route('prisoner.show');
    }
}
