
@extends('admin.layouts.appp')

@section('content')
    <div class="container">
        <h2>Job Type Details</h2>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">name: {{ $jobtypes->name }}</h5>
                <h5 class="card-title">status: {{ $jobtypes->status == 1? 'Active' : 'Inactive' }}</h5>
                <a href="{{ route('admin.jobtype') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
@endsection
