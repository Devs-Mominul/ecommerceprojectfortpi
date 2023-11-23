@extends('layouts.main')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">Product List</div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Category</th>
                    <th>Subcategory</th>
                    <th>Brand</th>
                    <th>P_Name</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>After Discount</th>

                    <th>preview</th>
                    <th>Action</th>
                </tr>
                @foreach ($products as $product)
                <tr>
                    <td>{{ $product->rel_to_category->category_name}}</td>
                    <td>{{ $product->rel_to_subcategory->subcategory_name}}</td>
                    <td>{{ $product->rel_to_brand->brand_name}}</td>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->discount }}</td>
                    <td>{{ $product->after_discount }}</td>
                    <td>
                        <img width="40px" src="{{ asset('uploads/product/preview/') }}/{{ $product->preview }}" alt=""></td>
                    <td>
                       <div class="d-flex">
                        <a  href="{{ route('product.delete',$product->id) }}" class="shadow btn btn-danger btn-xs sharp del_btn"><i class="fa fa-trash"></i></a>
                        <a  href="{{ route('product.show',$product->id) }}" class="shadow btn btn-info btn-xs sharp del_btn"><i class="fa fa-eye"></i></a>
                       </div>
                    </td>

                </tr>

                @endforeach

            </table>
        </div>
    </div>
</div>

@endsection
