
@extends('admin.layouts.appp')

@section('content')
    <div class="container">
        <h2>Category Details</h2>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">name: {{ $category->name }}</h5>
                <h5 class="card-title">status: {{ $category->status == 1? 'Active' : 'Inactive' }}</h5>
                <a href="{{ route('admin.category') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
@endsection
