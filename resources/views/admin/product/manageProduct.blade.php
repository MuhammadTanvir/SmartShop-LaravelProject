@extends('admin.master')
@section('content')

<hr>

<table class="table table-bordered table-hover">
<h3 class="text-center">Product Lists</h3>
 <h4 class="text-center text-success">
  {{Session::get('message')}}
  </h4> 
<thead>
<tr>
	<th>Product Name</th>
	<th>Category Name</th>
	<th>Manufacture Name</th>
	<th>Product Price</th>
	<th>Product Quantity</th>
	<th>Publication Status</th>
	<th>Action</th>
</tr>	
</thead>
	

<tbody>
@foreach($products as $product)
<tr>
	<th scope="row">{{$product->productName}}</th>
	<td>{{$product->categoryName}}</td>
	<td>{{$product->manufactureName}}</td>
	<td>BDT. {{$product->productPrice}}</td>
	<td>{{$product->productQuantity}}pcs</td>
	<td>{{$product->publicationStatus==0?'Published':'Unpublished'}}</td>
	<td>

	    <a href="{{url('/product/view/'.$product->id)}}" class="btn btn-info">
			<span class="glyphicon glyphicon-info-sign" title="Product View"></span>
		</a>
		<a href="{{url('/product/edit/'.$product->id)}}" class="btn btn-success">
			<span class="glyphicon glyphicon-edit" title="Product Edit"></span>
		</a>
		<a href="{{url('/product/delete/'.$product->id)}}" class="btn btn-danger" onclick="return confirm('Are U Sure To Delete This?');">
			<span class="glyphicon glyphicon-trash" title="Product Delete"></span>
		</a>
	</td>
	@endforeach
</tr>
</tbody>
</table>

@endsection