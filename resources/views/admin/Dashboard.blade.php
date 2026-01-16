@extends('admin.layouts.appp')

@section('title', 'Dashboard')

@section('content')
    <div class="mt-4">
        <h4 class="mb-4">Welcome, {{ auth()->user()->name }}</h4>
    </div>

    @include('frontend.layouts.message')

    <div class="row">
        <div class="col-sm-6 col-lg-3 mb-4">
            <a href="{{ route('admin.user') }}" class="text-decoration-none">
                <div class="card card-border-shadow-primary">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2 pb-1">
                            <div class="avatar me-2">
                                <span class="avatar-initial rounded bg-label-primary"><i class="ti ti-users ti-md"></i></span>
                            </div>
                            <h4 class="ms-1 mb-0">{{ $totalUsers }}</h4>
                        </div>
                        <p class="mb-1">Total Users</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-sm-6 col-lg-3 mb-4">
            <a href="{{ route('admin.job.list') }}" class="text-decoration-none">
                <div class="card card-border-shadow-success">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2 pb-1">
                            <div class="avatar me-2">
                                <span class="avatar-initial rounded bg-label-success"><i class="ti ti-briefcase ti-md"></i></span>
                            </div>
                            <h4 class="ms-1 mb-0">{{ $totalJobs }}</h4>
                        </div>
                        <p class="mb-1">Total Jobs</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-sm-6 col-lg-3 mb-4">
            <a href="{{ route('admin.category') }}" class="text-decoration-none">
                <div class="card card-border-shadow-warning">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2 pb-1">
                            <div class="avatar me-2">
                                <span class="avatar-initial rounded bg-label-warning"><i class="ti ti-folder ti-md"></i></span>
                            </div>
                            <h4 class="ms-1 mb-0">{{ $totalCategories }}</h4>
                        </div>
                        <p class="mb-1">Total Categories</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-sm-6 col-lg-3 mb-4">
            <a href="{{ route('admin.jobtype') }}" class="text-decoration-none">
            <div class="card card-border-shadow-info">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                            <span class="avatar-initial rounded bg-label-info"><i class="ti ti-list ti-md"></i></span>
                        </div>
                        <h4 class="ms-1 mb-0">{{ $totalJobTypes }}</h4>
                    </div>
                    <p class="mb-1">Total Job Types</p>
                </div>
            </div>
            </a>
        </div>
    </div>
@endsection
