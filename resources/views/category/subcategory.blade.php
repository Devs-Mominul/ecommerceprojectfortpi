@extends('layouts.main')
@section('content')
<div class="col-lg-8">
    <div class="card">
        <div class="card-header">Subcategory List</div>
        <div class="card-body">
           <div class="row">
            @foreach ($categories as $category)
            <div class="col-lg-6">
                <div class="card bg-gray">
                 <div class="card-header text-info">{{ $category->category_name }}</div>
                 <div class="card-body">
                     <table class="table table-bordered">
                         <thead>
                             <tr>
                                 <th>subategory</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>
                           @foreach ( App\Models\Subcategory::where('category_id',$category->id)->get() as $subcategory)
                           <tr>
                            <td>{{ $subcategory->subcategory_name }}</td>
                            <td>
                               <div class="d-flex">
                                <a href="{{ route('subcategory.edit',$subcategory->id) }}" class="mr-1 shadow btn btn-primary btn-xs sharp"><i class="fa fa-pencil"></i></a>
                                <a  href="{{ route('subcategory.delete',$subcategory->id) }}" class="shadow btn btn-danger btn-xs sharp del_btn"><i class="fa fa-trash"></i></a>
                               </div>
                            </td>
                        </tr>

                           @endforeach
                         </tbody>
                     </table>
                 </div>
                </div>
             </div>

            @endforeach

           </div>
        </div>
    </div>
</div>
<div class="col-lg-4">
    <div class="card">
        <div class="card-header">Add Subcategory</div>
        <div class="card-body">
            <form action="{{ route('subcategory.store') }}" method="post"  >
                @csrf
               <div class="mb-3">
                <select name="category" id="category" class="form-control">
                @foreach ($categories as $category)
                <option value="{{ $category->id}}">{{ $category->category_name }}</option>

                @endforeach

                </select>
               </div>
               <div class="mb-3">
                <label for="category_img">Category:</label>
                <input type="text" name="subcategory_name" id="subcategory_name" class="form-control" placeholder="subcategory">
               </div>
               <div class="mb-3">
                <button type="submit" class="btn btn-primary">Submit</button>
               </div>
            </form>
        </div>
    </div>
</div>

@endsection
