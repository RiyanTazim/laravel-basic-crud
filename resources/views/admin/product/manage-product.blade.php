@extends('admin.master')

@section('content')
    <section class="w-100">
        <h1 class="text-center py-3 m-0 bg-secondary text-light w-100" >Manage Products</h1>
        <h3 class="text-center text-success pt-4" id="success-msg" style="height: 60px">{{ Session()->get('notification') }}</h3>
        <table class="table table-striped text-center border-2 text-bold">
            <thead class="bg-dark text-light">
                <th>Id</th>
                <th>Title</th>
                <th>Price</th>
                <th>Offer</th>
                <th>Image</th>
                <th>Action</th>
            </thead>

            @foreach ($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->title}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->offer}}</td>
                <td><img src="{{asset('/')}}{{$product->image}}" alt="" height="80px" width="auto"></td>
                <td class="float-left">
                    <a href="{{route('product.edit', $product->id)}}" type="button" class="btn btn-success m-2">Edit</a>
                    <a href="{{route('product.delete', $product->id)}}" type="button" class="btn btn-danger" onclick="return confirm('Are You Sure?')">Delete</a>
                </td>
            </tr>
                
            @endforeach
        </table>
    </section>
@endsection