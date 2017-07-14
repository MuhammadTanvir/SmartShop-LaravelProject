<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use DB;

class CategoryController extends Controller
{
    public function createCategory(){
    	return view('admin.category.createCategory');
    }
    public function storeCategory(Request $request){

    	$this->validate($request,[
    		'categoryName'=>'required',
    		'categoryDescription'=>'required',
    		]);


    	// return view('admin.category.storeCategory');
    	// return $request->all();

    	//method #1

    	$category=new Category;
    	$category->categoryName=$request->categoryName;
    	$category->categoryDescription=$request->categoryDescription;
    	$category->publicationStatus=$request->publicationStatus;
    	$category->save();
    	return redirect('/category/add')->with('message','Category Info Stored Sussessfully');

    	//method #2

    	// Category::create($request->all());
    	// return redirect('/category/add');

    	//method #3

    	// DB::table('categories')->insert([
    	// 	'categoryName'=>$request->categoryName,
    	// 	'categoryDescription'=>$request->categoryDescription,
    	// 	'publicationStatus'=>$request->publicationStatus,

    	// 	]);
    	// return redirect('/category/add');

    }

 	public function manageCategory(){
 		$categories=Category::all();
    	return view('admin.category.manageCategory',['categories'=>$categories]);
    }

    public function editCategory($id){
    	// return $id;
    	$categoryById=Category::where('id',$id)->first();
 		return view('admin.category.editCategory',['categoryById'=>$categoryById]);
    }

     public function updateCategory(Request $request){
     	// dd($request->all());

     	$category=Category::find($request->id);
    	$category->categoryName=$request->categoryName;
    	$category->categoryDescription=$request->categoryDescription;
    	$category->publicationStatus=$request->publicationStatus;
    	$category->save();
    	return redirect('/category/manage')->with('message','Category Info Update Sussessfully');


    }
    public function deleteCategory($id){
     	// dd($request->all());
     	$category=Category::find($id);
     	$category->delete();
     	return redirect('/category/manage')->with('message','Category Info deleted Sussessfully');
    }

}

