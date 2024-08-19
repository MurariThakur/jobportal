
@extends('admin.layouts.appp')

@section('content')
    <div class="container">
        <h2>Job Details</h2>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Name: {{ $jobs->title }}</h5>
                <h5 class="card-title">Category: {{ $jobs->category->name }}</h5>
                <h5 class="card-title">Job Type: {{ $jobs->jobType->name }}</h5>
                <h5 class="card-title">User: {{ $jobs->user->name }}</h5>
                <h5 class="card-title">Vacancy: {{ $jobs->vacancy }}</h5>
                <h5 class="card-title">Salary: {{ $jobs->salary }}</h5>
                <h5 class="card-title">Location: {{ $jobs->location }}</h5>
                <h5 class="card-title">Description: {!! $jobs->description !!}</h5>
                <h5 class="card-title">Benefits: {!! $jobs->benefits !!}</h5>
                <h5 class="card-title">Reaponsiblity: {!! $jobs->responsibility !!}</h5>
                <h5 class="card-title">Qualifications: {!! $jobs->qualifications !!}</h5>
                <h5 class="card-title">Skills: {{ $jobs->keywords }}</h5>
                <h5 class="card-title">Experience: {{ $jobs->experience }}</h5>
                <h5 class="card-title">Company Name: {{ $jobs->company_name }}</h5>
                <h5 class="card-title">Company Location: {{ $jobs->company_location }}</h5>
                <h5 class="card-title">Company Website: {{ $jobs->company_website }}</h5>
                <h5 class="card-title">Status: {{ $jobs->status == 1? 'Active' : 'Inactive' }}</h5>
                <h5 class="card-title">Feature: {{ $jobs->isfeature == 1? 'Active' : 'Inactive' }}</h5>
                <a href="{{ route('admin.job.list') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
@endsection
