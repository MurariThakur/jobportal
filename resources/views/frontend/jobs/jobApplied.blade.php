@extends('frontend.layouts.app')

@section('title', 'my-jobs')

@section('main')
<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">My Jobs</li>
                    </ol>
                </nav>
            </div>
        </div>
        @include('frontend.layouts.message')
        <div class="row">
            @include('frontend.profile.sidebar')
            <div class="col-lg-9">
                <div class="card border-0 shadow mb-4 p-3">
                    <div class="card-body card-form">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h3 class="fs-4 mb-1">Jobs Applied</h3>
                            </div>
                            
                        </div>
                        <div class="table-responsive">
                            <table class="table ">
                                <thead class="bg-light">
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col">Job Applied</th>
                                        <th scope="col">Applicants</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="border-0">
                                    @foreach($jobApplied as $jobapply)
                                    <tr class="active">
                                        <td>
                                            <div class="job-name fw-500">{{ $jobapply->job->title }}</div>
                                            <div class="info1">{{ $jobapply->job->jobType->name }} . {{ $jobapply->job->location }}</div>
                                        </td>
                                        <td>{{ $jobapply->created_at->format('d M Y') }}</td>
                                        <td>{{ $jobapply->job->applications->count() }} Applications</td>
                                        <td>
                                            <div class="job-status text-capitalize">{{ $jobapply->job->status == 1 ? 'Active' : 'Inactive' }}</div>
                                        </td>
                                        <td>
                                            <div class="action-dots float-end">
                                                <a href="#" class="" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a class="dropdown-item" href="{{ route('frontend.jobdetail',$jobapply->job->id) }}"> <i class="fa fa-eye" aria-hidden="true"></i> View</a></li>
                                                    <li>
                                                        <form action="{{ route('frontend.jobApplieddelete', $jobapply->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this job?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item"><i class="fa fa-trash" aria-hidden="true"></i>Remove</button>
                                                            {{-- <li><a class="dropdown-item" ><i class="fa fa-trash" aria-hidden="true"></i> Remove</a></li> --}}
                                                        </form></a>
                                                        </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                                
                            </table>
                        </div>
                        {{-- {{ $jobapply->links() }} --}}
                    </div>
                </div> 
            </div>
        </div>
    </div>
</section>

@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>