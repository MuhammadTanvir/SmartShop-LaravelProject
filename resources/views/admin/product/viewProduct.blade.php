@extends('admin.master')
@section('content')

<hr>

<table class="table table-bordered table-hover">
<h3 class="text-center">Product Lists</h3>

<tr>
	<th>Product Id</th>
	<th>{{$product->id}}</th>
</tr>
<tr>
	<th>Product Name</th>
	<th>{{$product->productName}}</th>
</tr>
<tr>
	<th>Category Name</th>
	<th>{{$product->categoryName}}</th>
</tr>
<tr>
	<th>Manufacture Name</th>
	<th>{{$product->manufactureName}}</th>
</tr>
<tr>
	<th>Product Price</th>
	<th>{{$product->productPrice}}</th>
</tr>
<tr>
	<th>Product Quantity</th>
	<th>{{$product->productQuantity}}</th>
</tr>
<tr>
	<th>Product Short Description</th>
	<th>{!! $product->productShortDescription !!}</th>
</tr>
<tr>
	<th>Product Long Description</th>
	<th>{!! $product->productLongDescription !!}</th>
</tr>
<tr>
	<th>Product Image</th>
	<th><img src="{{asset($product->productImage)}}" alt="{{$product->productName}}" height="150" width="150"></th>
</tr>
<tr>
	<th>Publication Status</th>
	<th>{{$product->publicationStatus==0?'Published':'Unpublished'}}</th>
</tr>	

</table>





@endsection