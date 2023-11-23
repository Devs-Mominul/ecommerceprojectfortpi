@extends('layouts.main')

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4>User List</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
               <thead>
                <tr>
                    <th>sl</th>
                    <th>name</th>
                    <th>email</th>
                    <th>image</th>
                    <th>action</th>

                </tr>
               </thead>
                <tbody>
                    @foreach ($user as $user )
                  <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if($user->image!=null)
                        <img src="{{ asset('uploads/user') }}/{{ $user->image }}" alt="" width="60px" height="60px" style="border-radius:50%">
                        @else
                        <img src="{{ Avatar::create($user->name)->toBase64() }}" alt="" width="60">

                        @endif

                    </td>
                    <td>
                        <a href="#" class="mr-1 shadow btn btn-primary btn-xs sharp"><i class="fa fa-pencil"></i></a>
                        <button data-link="{{ route('user.remove',$user->id) }}"  class="shadow btn btn-danger btn-xs sharp del_btn"><i class="fa fa-trash"></i></button>
                    </td>
                  </tr>


                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>

@endsection
@push('footer_script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('.del_btn').click(function(){
      var link=$(this).attr('data-link')
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then((result) => {
        if (result.isConfirmed) {
         window.location.href=link
        }
      });

    })
</script>
@if(session('success'))
<script>
    Swal.fire({
        title: "Deleted!",
        text: "Your file has been deleted.",
        icon: "success"
      });
</script>

@endif

@endpush

