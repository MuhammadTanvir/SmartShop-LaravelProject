@extends('admin.master')

@section('content')
<br>
<div class="row">
  <div class="col-lg-12">
   <h3 class="text-center">Create Manufacture Form</h3>
  <h4 class="text-center text-success">
  {{Session::get('message')}}
  </h4> 

{!! Form::open(['url'=>'manufacture/save','method'=>'POST','class'=>'form-horizontal']) !!}
 
 <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Manufacture Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control col-sm-2" name="manufactureName" 
       placeholder="Manufacture Name">
       <span class="text-danger">{{$errors->has('manufactureName')?$errors->first('manufactureName'):''}}</span>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Manufacture Description
    </label>
    <div class="col-sm-10">
      <textarea class="form-control" rows="5" class="form-control" name="manufactureDescription" placeholder="Manufacture Description"></textarea>
      <span class="text-danger">{{$errors->has('manufactureDescription')?$errors->first('manufactureDescription'):''}}</span>
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
        Save Manufacture Info 
      </button>
    </div>
  </div>
  {!! Form::close() !!}
    </div>
</div>

 
@endsection