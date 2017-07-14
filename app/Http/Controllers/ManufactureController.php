<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manufacture;
use DB;

class ManufactureController extends Controller
{
     public function createManufacture(){
    	return view('admin.manufacture.createManufacture');
    }

     public function storeManufacture(Request $request){

         $this->validate($request,[
            'manufactureName'=>'required',
            'manufactureDescription'=>'required',
            ]);

    	// return $request->all();
    	$manufacture=new Manufacture;
    	$manufacture->manufactureName=$request->manufactureName;
    	$manufacture->manufactureDescription=$request->manufactureDescription;
    	$manufacture->publicationStatus=$request->publicationStatus;
    	$manufacture->save();
    	return redirect('/manufacture/add')->with('message','Manufacture Info Stored Sussessfully');
    }

     public function manageManufacture(){
 		$manufactures=Manufacture::all();
    return view('admin.manufacture.manageManufacture',['manufactures'=>$manufactures]);
    }

    public function editManufacture($id){
    	// return $id;
    	$manufactureById=Manufacture::where('id',$id)->first();
 		return view('admin.manufacture.editManufacture',['manufactureById'=>$manufactureById]);
    }

    public function updateManufacture(Request $request){
     	// dd($request->all());
     	$manufacture=Manufacture::find($request->id);
    	$manufacture->manufactureName=$request->manufactureName;
    	$manufacture->manufactureDescription=$request->manufactureDescription;
    	$manufacture->publicationStatus=$request->publicationStatus;
    	$manufacture->save();
    	return redirect('/manufacture/manage')->with('message','Manufacture Info Stored Sussessfully');
    }

    public function deleteManufacture($id){
     	// return $id;
     	$manufacture=Manufacture::find($id);
     	$manufacture->delete();
     	return redirect('/manufacture/manage')->with('message','Manufacture Info deleted Sussessfully');
    } 	
}
