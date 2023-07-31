@extends('admin.master')

@section('content')
<section class="w-100">
    <h1 class="text-center py-3 m-0 bg-secondary text-light w-100" >Manage Categories</h1>
    <h3 class="text-center text-success pt-4" id="success-msg" style="height: 60px">{{ Session()->get('notification') }}</h3>
    <table class="table table-striped text-center border-2 text-bold">
        <thead class="bg-dark text-light">
            <th>Id</th>
            <th>Category Name</th>
            <th>Category Description</th>
            <th>Action</th>
        </thead>
        @foreach ($categories as $category)
            
        <tr class="" >
            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>
            <td>{{$category->desc}}</td>
            <td class="float-left">
                <a href="{{ route('category.edit', $category->id) }}" type="button" class="btn btn-success m-2">Edit</a>
                <a href="{{ route('category.delete', $category->id) }}" type="button" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        @endforeach

    </table>
</section>
@endsection