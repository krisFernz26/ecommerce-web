@extends('layouts.master')
@section('content')

<div class="container">
	<h5>All Products</h5>
	<a href="/products/create">Create a new product</a>
	<table class="table">
		<thead>
			<tr>
				<th>TYPE</th>
				<th>POST</th>
				<th>NAME</th>
				<th>QUANTITY</th>
				<th>IMAGE</th>
				<th>ACTIONS</th>
			</tr>
		</thead>
		<tbody>
			@foreach($products as $product)
			<tr>
				<td> {{ $product->product_type->name }}</td>
				<td> <a href="/posts/{{ $product->post->id }}">{{ $product->post->title }}</a></td>
				<td> {{ $product->name }}</td>
				<td> {{ $product->quantity }}</td>
				<td> <a href="{{ $product->image }}" target="_blank"><img width="150px" height="100px"
							src="{{ $product->image }}" alt="{{ $product->name }} Image" /></a>
				</td>
				<td> <a href="/products/{{ $product->id }}">Display</a>
					|
					<a href="/products/{{ $product->id }}/edit">Edit</a>
					|
					<a href="/products/{{ $product->id }}/delete">Delete</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<p class="center">{{$products->links()}}</p>
</div>
@endsection