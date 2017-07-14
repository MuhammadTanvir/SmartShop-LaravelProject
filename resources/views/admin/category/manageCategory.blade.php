@extends('admin.master')
@section('content')

<hr>

<table class="table table-bordered table-hover">
<h3 class="text-center">Category Lists</h3>
 <h4 class="text-center text-success">
  {{Session::get('message')}}
  </h4> 
<thead>
<tr>
	<th>ID</th>
	<th>Category Name</th>
	<th>Category Description</th>
	<th>PublicationStatus</th>
	<th>Action</th>
</tr>	
</thead>
	

<tbody>
@foreach($categories as $category)
<tr>
	<th scope="row">{{$category->id}}</th>
	<td>{{$category->categoryName}}</td>
	<td>{{$category->categoryDescription}}</td>
	<td>{{$category->publicationStatus==0?'Published':'Unpublished'}}</td>
	<td>
		<a href="{{url('/category/edit/'.$category->id)}}" class="btn btn-success">
			<span class="glyphicon glyphicon-edit"></span>
		</a>
		<a href="{{url('/category/delete/'.$category->id)}}" class="btn btn-danger" onclick="return confirm('Are U Sure To Delete This?');">
			<span class="glyphicon glyphicon-trash"></span>
		</a>
	</td>
	@endforeach
</tr>
</tbody>
</table>

@endsection