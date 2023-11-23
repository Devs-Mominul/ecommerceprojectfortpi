@extends('layouts.main')
@section('content')
<div class="col-lg-8">
    <div class="card">
        <div class="card-header">Show Brand</div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Brand</th>
                    <th>Brand Logo</th>
                    <th>Action</th>
                </tr>
               @foreach ($brands as $brand)
               <tr>
                <td>{{ $brand->brand_name }}</td>
                <td>
                <img src="{{ asset('uploads/brand/') }}/{{ $brand->brand_logo }}" style="border-radius: 50%"  width="60px" height="60px"></td>
                <td>
                    <div class="d-flex">
                        <a href="{{ route('brand.edit',$brand->id) }}" class="mr-1 shadow btn btn-primary btn-xs sharp"><i class="fa fa-pencil"></i></a>
                        <a  href="{{ route('brand.delete',$brand->id) }}" class="shadow btn btn-danger btn-xs sharp del_btn"><i class="fa fa-trash"></i></a>
                       </div>
                </td>
               </tr>


               @endforeach

            </table>
        </div>
    </div>

</div>
<div class="col-lg-4">
    <div class="card">
        <div class="card-header">Add Brand</div>
        <div class="card-body">
            <form action="{{ route('brand.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="brand_name">Brand Name:</label>
                    <input type="text" name="brand_name" id="brand_name" class="form-control" placeholder="brand name">
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
