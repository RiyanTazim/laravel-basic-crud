@extends('admin.master')

@section('content')
<section>
    <h1 class="text-center py-3 bg-secondary text-light">Add Product</h1>
    <h3 class="text-center text-success pt-4" id="success-msg" style="height: 40px">{{Session()->get('notification')}}</h3>
    <form class="p-5" action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Product Title</label>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="mb-3">
            <label class="form-label">Product Price</label>
            <input type="text" class="form-control" name="price">
        </div>
        <div class="mb-3">
            <label class="form-label">Product Offer</label>
            <input type="text" class="form-control" name="offer">
        </div>
        
        <div class="mb-3">
          <label class="form-label">Add Product Image</label>
          <input type="file" accept="image/*" class="form-control" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Add Product</button>
      </form>
</section>
@endsection