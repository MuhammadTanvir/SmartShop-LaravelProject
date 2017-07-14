@extends('admin.master')
@section('content')

<hr>
<table class="table table-bordered table-hover">
<h3 class="text-center">Manufacture Lists</h3>
 <h4 class="text-center text-success">
  {{Session::get('message')}}
  </h4> 

<thead>
<tr>
	<th>ID</th>
	<th>Manufacture Name</th>
	<th>Manufacture Description</th>
	<th>PublicationStatus</th>
	<th>Action</th>
</tr>	
</thead>
	

<tbody>
@foreach($manufactures as $manufacture)
<tr>
	<th scope="row">{{$manufacture->id}}</th>
	<td>{{$manufacture->manufactureName}}</td>
	<td>{{$manufacture->manufactureDescription}}</td>
	<td>{{$manufacture->publicationStatus==0?'Published':'Unpublished'}}</td>
	<td>
		<a href="{{url('/manufacture/edit/'.$manufacture->id)}}" class="btn btn-success">
			<span class="glyphicon glyphicon-edit"></span>
		</a>
		<a href="{{url('/manufacture/delete/'.$manufacture->id)}}" class="btn btn-danger" onclick="return confirm('Are U Sure To Delete This?');">
			<span class="glyphicon glyphicon-trash"></span>
		</a>
	</td>
	@endforeach
</tr>
</tbody>
</table>

@endsection