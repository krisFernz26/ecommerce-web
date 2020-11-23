@extends('layouts.master')

@section('content')
<div class="container">
    <div class="section">
        <h5>Edit User Type</h5>
        <div class="row"></div>
        <div class="row">
            <form class="col s12" action="/posts/{{$post->id}}" method="POST">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="input-field col s12">
                        <input placeholder="Placeholder" id="title" type="text" class="validate" name="title"
                            value="{{$post->title}}">
                        <label for="title">Title</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="description" type="text" class="validate" name="description"
                            value="{{$post->description}}">
                        <label for="description">Description</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <select id="user" name="user_id" value="{{$post->user}}">
                            @foreach ($users as $user)
                            <option value="{{$user->id}}">{{$user->first_name}} {{$user->last_name}}</option>
                            @endforeach
                        </select>
                        <label>User:</label>
                    </div>
                    <div class="input-field col s6">
                        <select id="product" name="product_id">
                            @foreach ($products as $product)
                            <option value="{{$product->id}}">{{$product->name}}: {{$product->quantity}}</option>
                            @endforeach
                        </select>
                        <label>Product</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <select id="sold" name="sold" value="{{$post->sold}}">
                            <option value='1'>Yes</option>
                            <option value='0'>No</option>
                        </select>
                        <label>Sold?</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field">
                        <button class="btn waves-effect waves-light pink darken-3" type="submit" name="action">Update
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection