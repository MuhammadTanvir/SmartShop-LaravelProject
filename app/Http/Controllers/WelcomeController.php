<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class WelcomeController extends Controller
{
    public function index(){
        $publishedProducts=Product::where('publicationStatus',0)->get();
    	return view('frontEnd.home.homeContent',['publishedProducts'=>$publishedProducts]);
    }
    public function category($id){
        $publishedCategoryProducts=Product::where('categoryId',$id)
                                            ->where('publicationStatus',0)
                                            ->get();

return view('frontEnd.category.categoryContent',['publishedCategoryProducts'=>$publishedCategoryProducts]);
    }

    public function productDetails($id){

    $productById=Product::where('id',$id)->first();
    return view('frontEnd.product.productContent',['productById'=>$productById]);
    }

    public function contact(){

    	return view('frontEnd.contact.contactContent');
    }
}
