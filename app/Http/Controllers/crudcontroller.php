<?php

namespace App\Http\Controllers;

use App\Models\cruds;
use Illuminate\Http\Request;
use PDO;

class crudcontroller extends Controller
{
    //
    public function index(){
        $n='1';
        $ards=cruds::paginate(3);
        return view('welcome',compact('ards','n'));

        return view('welcome');
    }
    public function create(Request $request){
        $validate=$request->validate([
            'image'=>'required',
            'name'=>'required'
        ]);
        if($validate){
            $image=$request->file('image');
            $extension=$image->getClientOriginalExtension();
            $image_name=time().'.'.$extension;
            $image_name_path='/storage/pics/'.$image_name;
            $image->move('storage/pics',$image_name);
             cruds::create([
             'image'=>$image_name_path,
             'name'=>$request->name
             ]);
         }
         return redirect()->back();
 
    }
    public function delete(Request $request,$id){
        $cruds=cruds::where('id','=',$id)->delete();
        if($cruds){
            return redirect()->back();
       }}
       public function update(Request $request,$id){
        $ard=cruds::where('id','=',$id)->first();
        return view('update',compact('ard'));
       }
       public function update2(Request $request,$id){
        $validate=$request->validate([
            'image'=>'required',
            'name'=>'required'
        ]);
        if($validate){
            $image=$request->file('image');
            $extension=$image->getClientOriginalExtension();
            $image_name=time().'.'.$extension;
            $image_name_path='/storage/pics/'.$image_name;
            $image->move('storage/pics',$image_name);
             cruds::where('id','=',$id)->update([
             'image'=>$image_name_path,
             'name'=>$request->name
             ]);}
        return redirect('/');
       }

        public function createn(Request $request){
            
                $image=$request->file('image');
                $extension=$image->getClientOriginalExtension();
                $image_name=time().'.'.$extension;
                $image_name_path='/storage/pics/'.$image_name;
                $image->move('storage/pics',$image_name);
                $data=cruds::create([
                    'image'=>$image_name_path,
                    'name'=>$request->name
                    ]);  
           if($data){
            return response()->json([
                'message'=>'cruds added',
                'status'=>'success',
                'data'=>$data 
            ]);
                }}

       }