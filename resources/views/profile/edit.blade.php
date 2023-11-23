@extends('layouts.main')
@section('content')
<div class="col-lg-6">
    <div class="card">
        <div class="card-header">Update Profile</div>
        <div class="card-body">
            <form action="{{ route('profile.update') }}" method="post">
                @method('patch')
                @csrf
                <div class="mb-3">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name">
                </div>
                <div class="mb-3">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="example@gmail.com">
                </div>
                <div class="mb-2">

                   <button type="submit"   class="btn btn-primary"  >Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="col-lg-6">
    <div class="card">
        <div class="card-header">Update Password</div>
        <div class="card-body">
            <form action="{{ route('password.update') }}" method="post">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="name password">Current Password:</label>
                    <input type="password" name="current_password" id="current_password" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" class="form-control" >
                </div>
                <div class="mb-3">
                    <label for="password">New Password:</label>
                    <input type="password" name="password_confirmation" id="password_passw" class="form-control" >
                </div>
                <div class="mb-2">

                   <button type="submit"   class="btn btn-primary"  >Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="col-lg-6">
    <div class="card">
        <div class="card-header">Update Profile</div>
        <div class="card-body">
            <form action="{{ route('profile.image') }}" method="post" enctype="multipart/form-data">

                @csrf
                <div class="mb-3">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name">
                </div>
                <div class="mb-3">
                    <label for="email">Upload Image:</label>
                    <input type="file" name="image" id="image" class="form-control" placeholder="example@gmail.com">
                </div>
                <div class="mb-2">

                   <button type="submit"   class="btn btn-primary"  >Update</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
