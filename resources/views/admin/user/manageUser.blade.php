@extends('admin.master')
@section('content')

<hr>

<table class="table table-bordered table-hover">
<h3 class="text-center">Category Lists</h3>
 <h4 class="text-center text-success">
  {{Session::get('message')}}
  </h4> 
  <p class="text-center">{{$users->total()}} users {{$users->count()}} in this pages</p>
  
<thead>
<tr>
	<th>ID</th>
	<th>User ID</th>
	<th>User Name</th>
	<th>Email</th>
	<th>Action</th>
</tr>	
</thead>
	

<tbody>
<?php $i=1; ?> 
@foreach($users as $user)
<tr>
	<td>{{$i++}}</td>
	<td>{{$user->id}}</td>
	<td>{{$user->name}}</td>
	<td>{{$user->email}}</td>
	
	<td>
		<a href="" class="btn btn-success">
			<span class="glyphicon glyphicon-edit"></span>
		</a>
		<a href="" class="btn btn-danger" onclick="return confirm('Are U Sure To Delete This?');">
			<span class="glyphicon glyphicon-trash"></span>
		</a>
	</td>
	@endforeach
</tr>
</tbody>
</table>
<div>{{$users->links()}}</div>
@endsection