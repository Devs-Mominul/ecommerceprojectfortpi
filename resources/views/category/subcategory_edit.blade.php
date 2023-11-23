@extends('layouts.main')
@section('content')
<div class="col-lg-8"></div>
<div class="col-lg-4">
    <div class="card">
        <div class="card-header">Edit Subcategory</div>
        <div class="card-body">
            <form action="{{ route('subcategory.update',$subcategories->id) }}" method="post"  >
                @csrf
               <div class="mb-3">
                <select name="category" id="category" class="form-control">
                @foreach ($categories as $category)
                <option {{ $category->id==$subcategories->category_id?'selected':'' }} value="{{ $category->id}}">{{ $category->category_name }}</option>

                @endforeach

                </select>
               </div>
               <div class="mb-3">
                <label for="category_img">Category:</label>
                <input type="text" name="subcategory_name" id="subcategory_name" class="form-control" placeholder="subcategory" value="{{ $subcategories->subcategory_name }}">
               </div>
               <div class="mb-3">
                <button type="submit" class="btn btn-primary">Submit</button>
               </div>
            </form>
        </div>
    </div>
</div>

@endsection
