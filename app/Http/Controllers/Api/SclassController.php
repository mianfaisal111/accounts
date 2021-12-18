<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SclassController extends Controller
{
    //
    public function index(){
        $class_name = DB::table('sclasses')->get();
        return response()->json($class_name);
    }
    public function show($id){
        $class_name = DB::table('sclasses')->where('id', $id)->first();
        return response()->json($class_name);
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'class_name' => 'required|unique:sclasses|max:25'
        ]);
        $data = array();
        $data['class_name'] = $request->class_name;
        $insert = DB::table('sclasses')->insert($data);
        return response('Inserted successfuly');
    }
    public function update(Request $request, $id){
        $validateData = $request->validate([
            'class_name' => 'required|unique:sclasses|max:25'
        ]);
        $data = array();
        $data['class_name'] = $request->class_name;
        $update = DB::table('sclasses')->where('id',$id)->update($data);
        return response('Updated successfuly');
    }
    public function destroy($id){
        $delete = DB::table('sclasses')->where('id',$id)->delete();
        return response("Deleted Successfully!");
    }
}
