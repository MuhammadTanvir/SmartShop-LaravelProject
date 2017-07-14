@extends('admin.master')
@section('content')
<br>
<div class="row">
  <div class="col-lg-12">
  <h3 class="text-center">Create Product Form</h3>
  <h4 class="text-center text-success">
  {{Session::get('message')}}
  </h4> 

{!! Form::open(['url'=>'product/save','method'=>'POST','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
 
 <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Product Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control col-sm-2" name="productName" 
       placeholder="Product Name">
       <span class="text-danger">{{$errors->has('productName')?$errors->first('productName'):''}}</span>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Category Name   
    </label>
    <div class="col-sm-10">
    <select class="form-control" name="categoryId">
          <option>Select Category Name</option>
          @foreach($categories as $category)
     <option value="{{$category->id}}">{{$category->categoryName}}</option>

      @endforeach
     
   </select>
    </div>
  </div>
   <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Manufacture Name   
    </label>
     <div class="col-sm-10">
    <select class="form-control" name="manufactureId">
          <option>Select Manufacture Name</option>
          @foreach($manufactures as $manufacture)
     <option value="{{$manufacture->id}}">{{$manufacture->manufactureName}}</option>

      @endforeach
     
   </select>
    </div>
  </div>
   <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Product Price</label>
    <div class="col-sm-10">
      <input type="number" class="form-control col-sm-2" name="productPrice" 
       placeholder="Product Price">
       <span class="text-danger">{{$errors->has('productPrice')?$errors->first('productPrice'):''}}</span>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Product Quantity</label>
    <div class="col-sm-10">
      <input type="number" class="form-control col-sm-2" name="productQuantity" 
       placeholder="Product Quantity">
       <span class="text-danger">{{$errors->has('productQuantity')?$errors->first('productQuantity'):''}}</span>
    </div>
  </div>

 <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Product Short Description
    </label>
    <div class="col-sm-10">
      <textarea class="form-control" rows="3" class="form-control" name="productShortDescription" placeholder="Product Short Description"></textarea>
      <span class="text-danger">{{$errors->has('productShortDescription')?$errors->first('productShortDescription'):''}}</span>
    </div>
  </div>
 <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Product Long Description
    </label>
    <div class="col-sm-10">
      <textarea class="form-control" rows="5" class="form-control" name="productLongDescription" placeholder="Product Long Description"></textarea>
      <span class="text-danger">{{$errors->has('productLongDescription')?$errors->first('productLongDescription'):''}}</span>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Product Image</label>
    <div class="col-sm-10">
      <input type="file" name="productImage" accept="Image/*">
       <span class="text-danger">{{$errors->has('productImage')?$errors->first('productImage'):''}}</span>
    </div>
  </div>
  

<div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Publication Status   
    </label>
    <div class="col-sm-10">
    <select class="form-control" name="publicationStatus">
          <option>Select Publication Status</option>
           <option value="0">Published</option>
           <option value="1">Unpublished</option>
      
     
   </select>
    </div>
  </div>


  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="btn" class="btn btn-success btn-block">
        Save Product Info 
      </button>
    </div>
  </div>
  {!! Form::close() !!}
    </div>
</div>

 
@endsection