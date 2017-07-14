<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Manufacture;
use App\Product;
use DB;


class ProductController extends Controller
{
    public function createProduct(){
    	$categories=Category::where('publicationStatus',0)->get();
    	$manufactures=Manufacture::where('publicationStatus',0)->get();
   return view('admin.product.createProduct',
   	['categories'=>$categories,
   	'manufactures'=>$manufactures]);
    }

    public function storeProduct(Request $request){

    	$this->validate($request,[
    		'productName'=>'required',
    		'productPrice'=>'required',
    		'productImage'=>'required', 
    		]);


    	$productImage=$request->file('productImage');
    	$ImageName=$productImage->getClientOriginalName();
    	$uploadPath='public/productImage/';
    	$productImage->move($uploadPath, $ImageName);
    	$imageUrl=$uploadPath.$ImageName;
    	$this->saveProductInfo($request,$imageUrl);
    	return redirect('/product/add')->with('message','Product Info Stored Sussessfully');

    }
    protected function saveProductInfo($request,$imageUrl){
    	$product=new Product();
    	$product->productName=$request->productName;
    	$product->categoryId=$request->categoryId;
    	$product->manufactureId=$request->manufactureId;
    	$product->productPrice=$request->productPrice;
    	$product->productQuantity=$request->productQuantity;
    $product->productShortDescription=$request->productShortDescription;
    	$product->productLongDescription=$request->productLongDescription;
    	$product->productImage=$imageUrl;
    	$product->publicationStatus=$request->publicationStatus;
    	$product->save();
    
    }
    public function manageProduct(){

    $products=DB::table('products')
    ->join('categories','products.categoryId','=','categories.id')
    ->join('manufactures','products.manufactureId','=','manufactures.id')
    ->select('products.*','categories.categoryName','manufactures.manufactureName')
    ->get();
 	return view('admin.product.manageProduct',['products'=>$products]);
    }

    public function viewProduct($id){
    	$productById=DB::table('products')
    ->join('categories','products.categoryId','=','categories.id')
    ->join('manufactures','products.manufactureId','=','manufactures.id')
    ->select('products.*','categories.categoryName','manufactures.manufactureName')
    ->where('products.id',$id)
    ->first();
 	return view('admin.product.viewProduct',['product'=>$productById]);
   

    }

    public function editProduct($id){
    $categories=Category::where('publicationStatus',0)->get();
    $manufactures=Manufacture::where('publicationStatus',0)->get();
     $productById=Product::where('id',$id)->first();	
    return view('admin.product.editProduct',['productById'=>$productById,
    	'categories'=>$categories,'manufactures'=>$manufactures]);

    
    }

    public function updateProduct(Request $request){
    	$imageUrl=$this->imageExists($request);

    	$product=Product::find($request->id);

    // 	$product->productName=$request->productName;
    // 	$product->categoryId=$request->categoryId;
    // 	$product->manufactureId=$request->manufactureId;
    // 	$product->productPrice=$request->productPrice;
    // 	$product->productQuantity=$request->productQuantity;
    // $product->productShortDescription=$request->productShortDescription;
    // 	$product->productLongDescription=$request->productLongDescription;
    // 	$product->productImage=$imageUrl;
    // 	$product->publicationStatus=$request->publicationStatus;
    // 	$product->save();
    // 	return redirect('/product/manage')->with('message','Manufacture Info Updated Sussessfully');


	}


	private function imageExists($request){
		$productById=Product::where('id',$request->productId)->first();
		$productImage=$request->file('productImage');
		if($productImage){
		unlink($productById->productImage);	
		$ImageName=$productImage->getClientOriginalName();
    	$uploadPath='public/productImage/';
    	$productImage->move($uploadPath, $ImageName);
    	$imageUrl=$uploadPath.$ImageName;
		}
		else{
			$imageUrl=$productById->productImage;
		}
		return $imageUrl;
	}

      public function deleteProduct($id){
     	// return $id;
     	$product=Product::find($id);
     	$product->delete();
     	return redirect('/product/manage')->with('message','Product Info deleted Sussessfully');
    } 	


}
