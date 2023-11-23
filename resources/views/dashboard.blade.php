@extends('layouts.main')
@section('content')
<div class="col-lg-6">
    <div class="card">
        <div class="card-header">Admin Dashboard</div>
        <div class="card-body">
            <h4>Welcome To Dashboard <span class="text-info">{{ Auth::user()->name }}</span></h4>
        </div>
    </div>
</div>

@endsection
