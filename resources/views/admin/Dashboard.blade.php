@extends('admin.layouts.appp')

@section('title', 'Dashboard')

@section('content')
    <div class="mt-4">
        {{-- <p>Welcome, {{ auth()->user()->name }}</p> --}}
    </div>

    @include('frontend.layouts.message')

    <div class="row">
        <div class="col-sm-6 col-lg-3 mb-4">
            {{-- <a href="{{ route('tasks.index') }}" class="text-decoration-none"> --}}
                <div class="card card-border-shadow-primary">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2 pb-1">
                            <div class="avatar me-2">
                                <span class="avatar-initial rounded bg-label-primary"><i class="ti ti-list ti-md"></i></span>
                            </div>
                            <h4 class="ms-1 mb-0"></h4>
                        </div>
                        <p class="mb-1">Total Tasks</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-sm-6 col-lg-3 mb-4">
            {{-- <a href="{{ route('tasks.completed') }}" class="text-decoration-none"> --}}
                <div class="card card-border-shadow-success">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2 pb-1">
                            <div class="avatar me-2">
                                <span class="avatar-initial rounded bg-label-success"><i class="ti ti-check ti-md"></i></span>
                            </div>
                            <h4 class="ms-1 mb-0"></h4>
                        </div>
                        <p class="mb-1">Completed Tasks</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-sm-6 col-lg-3 mb-4">
            {{-- <a href="{{ route('tasks.pending') }}" class="text-decoration-none"> --}}
                <div class="card card-border-shadow-warning">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2 pb-1">
                            <div class="avatar me-2">
                                <span class="avatar-initial rounded bg-label-warning"><i class="ti ti-clock ti-md"></i></span>
                            </div>
                            <h4 class="ms-1 mb-0"></h4>
                        </div>
                        <p class="mb-1">Pending Tasks</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-sm-6 col-lg-3 mb-4">
            {{-- <a href="{{ route('tasks.overdue') }}" class="text-decoration-none"> --}}
            <div class="card card-border-shadow-danger">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                            <span class="avatar-initial rounded bg-label-danger"><i class="ti ti-alert-circle ti-md"></i></span>
                        </div>
                        <h4 class="ms-1 mb-0"></h4>
                    </div>
                    <p class="mb-1">Overdue Tasks</p>
                </div>
            </div>
            </a>
        </div>
    </div>
    {{-- @foreach($tasksDueSoon as $task)
    <div class="alert alert-warning mt-4">
        Task <strong>{{ $task->title }}</strong> due date is going to end today.
    </div>
@endforeach --}}
@endsection
