@extends('layouts.main')
@section('content')
<div class="col-lg-8">
    <div class="card">
        <div class="card-header">Add Color List</div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Color Name</th>
                    <th>Color Code</th>
                    <th>Action</th>
                </tr>
                @foreach ($color as $color)
                <tr>
                    <td>{{ $color->color_name }}</td>
                    <td>
                        <i style="width:40px;background-color:{{ $color->color_code  }};height:40px;color:transparent;">
                            @if($color->color_code==null)
                            <span class="text-danger">{{ $color->color_name }}</span>
                            @else
                            <span style="color:transparent;">color</span>
                            @endif

                        </i>
                    </td>
                </tr>


                @endforeach

            </table>
        </div>
    </div>

</div>
<div class="col-lg-4">
    <div class="card">
        <div class="card-header">
            Add color varition
        </div>
        <div class="card-body">
            <form action="{{ route('varition.post') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="color_nae">Color Name:</label>
                    <input type="text" name="color_name" id="color_name" class="form-control">
                </div>
                  <div class="mb-3">
                    <label for="color_nae">Color Code:</label>
                    <input type="text" name="color_code" id="color_code" class="form-control">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
