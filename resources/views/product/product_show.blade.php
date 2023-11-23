@extends('layouts.main')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">Show Product</div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <td>Product Name</td>
                    <td>{{ $product->product_name }}</td>
                </tr>
                <tr>
                    <td>Product price</td>
                    <td>{{ $product->price }}</td>
                </tr>
                <tr>
                    <td>Short Desp</td>
                    <td>{{ $product->short_desp }}</td>
                </tr>
                <tr>
                    <td>long Desp</td>
                    <td>{{!! $product->long_desp !!}}</td>
                </tr>
                <tr>
                    <td>Additional Info</td>
                    <td>{{!! $product->addi_info !!}}</td>
                </tr>
                <tr>
                    <td>Preview</td>
                    <td><img width='150' src="{{ asset('uploads/product/preview/') }}/{{ $product->preview }}" alt=""></td>
                </tr>
                <tr>
                    <td>Galldery</td>
                    <td>
                        @foreach ($gallery as $gal)
                        <img  width='200'height='200' src="{{ asset('uploads/gallery/') }}/{{ $gal->gallery_image }}" alt="">

                        @endforeach
                    </td>
                </tr>



            </table>
        </div>
    </div>
</div>

@endsection
