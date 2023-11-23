@extends('layouts.main')
@section('content')
<div class="col-lg-8">
    <div class="card">
        <div class="card-header">
            <h4>Edit Category</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('category.update') }}" method="post" enctype="multipart/form-data" >
                @csrf
               <div class="mb-3">
                <label for="category_name">Category Name:</label>
                <input type="hidden" name="category_id" value="{{ $category_info->id }}">
                <input type="text" name="category_name" id="category_name" class="form-control" placeholder="Edit Category" value="{{ $category_info->category_name }}">
               </div>
               <div class="mb-3">
                <label for="category_img">Category Image:</label>
                <input type="file" name="category_img" id="category_img" class="form-control">
               </div>
               <div class="mb-3">
                <button type="submit" class="btn btn-primary">Submit</button>
               </div>
            </form>
        </div>
    </div>
</div>


@endsection
