@extends('layouts.main')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">Edit Brand</div>
        <div class="card-body">
            <form action="{{ route('brand.update',$brands->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="brand_name">Brand Name:</label>
                    <input type="text" name="brand_name" id="brand_name" class="form-control" placeholder="brand name" value="{{ $brands->brand_name }}">
                </div>
                <div class="mb-3">
                    <label for="brand_logo">Brand Logo:</label>
                    <input type="file" name="brand_logo" id="brand_logo" class="form-control">
                </div>
                <div class="mb-2">
                    <button type="submit" class="btn btn-primary">submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
