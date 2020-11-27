@extends('layouts.master')

@section('content')
<div class="container">
    <div class="section">
        <div class="row">
            <div class="card">
                <span class="card-title">Post: {{ $post->title}}
                </span>
                <div class="card-content">
                    @if ($post->sold)
                    <h4> Sold!</h4>
                    @else
                    <h4> Available</h4>
                    @endif
                    <h6>Seller Email</h6>
                    <p style="margin-left: 1em">{{ $post->user->email }}</p>
                    <h6>Description</h6>
                    <p style="margin-left: 1em">{{ $post->description }}</p>
                    <br>
                    <h5>Products</h5>
                    <a href="/products/create">Add a product</a>
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Product Type</th>
                                <th>Image</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($post->products as $product)
                            <tr>
                                <td><a href="/products/{{$product->id}}"></a>{{$product->name}}</td>
                                <td><a
                                        href="/product-types/{{$product->product_type->id}}">{{$product->product_type->name}}</a>
                                </td>
                                <td><img src="{{$product->image}}" alt="{{$product->name}}" width="100px"></td>
                                <td>{{$product->quantity}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-action">
                    <a href="/posts/{{$post->id}}/edit">EDIT</a>
                </div>
                <div class="card-action">
                    <a href="/posts/{{$post->id}}/delete">DELETE</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection