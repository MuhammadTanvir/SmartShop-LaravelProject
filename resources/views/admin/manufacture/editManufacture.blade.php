@extends('admin.master')
@section('content')
<br>

<div class="row">
  <div class="col-lg-12">
   <h3 class="text-center">Edit Manufacture Form</h3>
  <h4 class="text-center text-success">
  {{Session::get('message')}}
  </h4> 

{!! Form::open(['url'=>'manufacture/update','method'=>'POST','class'=>'form-horizontal','name'=>'editManufactureForm']) !!}

 <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Manufacture Name</label>
    <div class="col-sm-10">
    <input type="hidden" class="form-control col-sm-2" name="id" 
      value="{{$manufactureById->id}}" placeholder="Manufacture Name">

      <input type="text" class="form-control col-sm-2" name="manufactureName" 
      value="{{$manufactureById->manufactureName}}" placeholder="Manufacture Name">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Manufacture Description
    </label>
    <div class="col-sm-10">
      <textarea class="form-control" rows="5" class="form-control" name="manufactureDescription" placeholder="Manufacture Description">{{$manufactureById->manufactureDescription}}</textarea>
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
        Update Manufacture Info 
      </button>
    </div>
    </div>


{!! Form::close() !!}
    </div>
</div>

  
  
  
<script>
  document.forms['editManufactureForm'].elements['publicationStatus'].value={{$manufactureById->publicationStatus}}
</script>





@endsection