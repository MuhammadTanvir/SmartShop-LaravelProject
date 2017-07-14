@extends('admin.master')

@section('content')
<br>

<div class="row">
  <div class="col-lg-12">
   <h2 class="text-center">Edit Category Form</h2>
  <h3 class="text-center text-success">
  {{Session::get('message')}}
  </h3> 

{!! Form::open(['url'=>'category/update','method'=>'POST','class'=>'form-horizontal','name'=>'editCategoryForm']) !!}

 <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Category Name</label>
    <div class="col-sm-10">
    <input type="hidden" class="form-control col-sm-2" name="id" 
      value="{{$categoryById->id}}" placeholder="Category Name">

      <input type="text" class="form-control col-sm-2" name="categoryName" 
      value="{{$categoryById->categoryName}}" placeholder="Category Name">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Category Description
    </label>
    <div class="col-sm-10">
      <textarea class="form-control" rows="5" class="form-control" name="categoryDescription" placeholder="Category Description">{{$categoryById->categoryDescription}}</textarea>
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

  
  
  
<script>
  document.forms['editCategoryForm'].elements['publicationStatus'].value={{$categoryById->publicationStatus}}
</script>





@endsection