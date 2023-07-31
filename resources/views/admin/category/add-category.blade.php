@extends('admin.master')

@section('content')
    <h1 class="text-center py-3 bg-secondary text-light">Add New Category</h1>
    <h3 class="text-center text-success pt-4" id="success-msg" style="height: 60px">{{ Session()->get('notification') }}</h3>
    <form class="p-5" action="{{ route('category.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">
                <h4>Category Name.*</h4>
            </label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="mb-3">
            <label class="form-label d-flex align-iteam-center ">
                <h4>Category Description.</h4>
                <h6>(Optional)</h6>
            </label>
            <input type="text" class="form-control" name="desc">
        </div>
        <button type="submit" class="btn btn-primary">Add New Category</button>
    </form>
@endsection
