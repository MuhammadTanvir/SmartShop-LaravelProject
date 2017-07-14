@extends('admin.master')

@section('content')
<br>
<div class="row">
  <div class="col-lg-12">
  <h3 class="text-center">Create Category Form</h3>
  <h4 class="text-center text-success">
  {{Session::get('message')}}
  </h4> 

{!! Form::open(['url'=>'category/save','method'=>'POST','class'=>'form-horizontal']) !!}
 
 <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Category Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control col-sm-2" name="categoryName" 
       placeholder="Category Name">
       <span class="text-danger">{{$errors->has('categoryName')?$errors->first('categoryName'):''}}</span>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Category Description
    </label>
    <div class="col-sm-10">
      <textarea class="form-control" rows="5" class="form-control" name="categoryDescription" placeholder="Category Description"></textarea>
      <span class="text-danger">{{$errors->has('categoryDescription')?$errors->first('categoryDescription'):''}}</span>
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
        Save Category Info 
      </button>
    </div>
  </div>
  {!! Form::close() !!}
    </div>
</div>

 
@endsection