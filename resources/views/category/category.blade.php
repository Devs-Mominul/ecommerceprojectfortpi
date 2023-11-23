@extends('layouts.main')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">All Category List</div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th><div class="mb-3 custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="checkAll">
                            <label class="custom-control-label" for="checkAll">Check All</label>
                        </div></th>
                        <th>Category Name</th>
                        <th>Category Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>
                            <div class="mb-3 custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="cate{{ $category->id }}" required="">
                                <label class="custom-control-label" for="cate{{ $category->id }}"></label>
                            </div>
                        </td>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->category_name }}</td>
                        <td><img width="60" src="{{ asset('uploads/category/') }}/{{ $category->category_img }}" alt=""></td>
                        <td>
                            <a href="{{ route('category.edit',$category->id) }}" class="mr-1 shadow btn btn-primary btn-xs sharp"><i class="fa fa-pencil"></i></a>
                            <a  href="{{ route('category.delete',$category->id) }}" class="shadow btn btn-danger btn-xs sharp del_btn"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>

                    @endforeach
                </tbody>

            </table>

    {!! $categories->withQueryString()->links('pagination::bootstrap-5') !!}
            <button type="btn" class=" btn btn-danger">Delete All</button>
        </div>
    </div>
</div>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4>Add Category</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('category.story') }}" method="post" enctype="multipart/form-data" >
                @csrf
               <div class="mb-3">
                <label for="category_name">Category Name:</label>
                <input type="text" name="category_name" id="category_name" class="form-control" placeholder="Add Category">
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
@push('footer_script')
<script>
    $("#checkAll").click(function(){
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
</script>

@endpush
