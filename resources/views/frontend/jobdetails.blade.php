@extends('frontend.layouts.app')

@section('main')
    <section class="section-4 bg-2">
        <div class="container pt-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class=" rounded-3 p-3">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ url()->previous() }}"><i class="fa fa-arrow-left"
                                        aria-hidden="true"></i> &nbsp;Back to Jobs</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="container job_details_area">
            @include('frontend.layouts.message')
            @if (session('error'))
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                    <symbol id="exclamation-circle-fill" viewBox="0 0 16 16">
                        <path
                            d="M16 8a8 8 0 1 1-16 0 8 8 0 0 1 16 0zM8 4a.5.5 0 0 0-.5.5V8a.5.5 0 0 0 1 0V4.5A.5.5 0 0 0 8 4zm0 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                    </symbol>
                </svg>
                <div id="error-alert" class="alert alert-danger d-flex align-items-center alert-dismissible fade show"
                    role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" fill="currentColor" role="img"
                        aria-label="Error:">
                        <use xlink:href="#exclamation-circle-fill"></use>
                    </svg>

                    <div>
                        {{ session('error') }}
                    </div>

                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="row pb-5">
                <div class="col-md-8">
                    <div class="card shadow border-0">
                        <div class="job_details_header">
                            <div class="single_jobs white-bg d-flex justify-content-between">
                                <div class="jobs_left d-flex align-items-center">

                                    <div class="jobs_conetent">
                                        <a href="#">
                                            <h4>{{ $jobs->title }}</h4>
                                        </a>
                                        <div class="links_locat d-flex align-items-center">
                                            <div class="location">
                                                <p> <i class="fa fa-map-marker"></i> {{ $jobs->location }}</p>
                                            </div>
                                            <div class="location">
                                                <p> <i class="fa fa-clock-o"></i>{{ $jobs->jobType->name }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="jobs_right">
                                    <div class="apply_now">
                                        @if (Auth::check())
                                            <form method="POST" action="{{ route('frontend.savejob', $jobs->id) }}"
                                                class="mb-0">
                                                @csrf
                                                <button type="submit" class="heart" style=" border: none; ">
                                                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                        @else
                                            <a href="{{ route('frontend.login') }}" class="heart"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="descript_wrap white-bg">
                            <div class="single_wrap">
                                <h4>Job description</h4>
                                <li>{!! nl2br($jobs->description) !!}</li>
                            </div>
                            @if ($jobs->responsibility)
                                <div class="single_wrap">
                                    <h4>Responsibility</h4>
                                    <ul>
                                        <li>{!! nl2br($jobs->responsibility) !!}</li>
                                    </ul>
                                </div>
                            @endif
                            @if ($jobs->qualifications)
                                <div class="single_wrap">
                                    <h4>Qualifications</h4>
                                    <ul>
                                        <li>{!! nl2br($jobs->qualifications) !!}</li>
                                    </ul>
                                </div>
                            @endif
                            @if ($jobs->benefits)
                                <div class="single_wrap">
                                    <h4>Benefits</h4>
                                    <p> {!! nl2br($jobs->benefits) !!} </p>
                                </div>
                            @endif
                            <div class="border-bottom"></div>
                            <div class="pt-3 text-end d-flex justify-content-end">

                                @if (Auth::check())
                                @if($isApplied)
                                    <button type='submit' class="btn btn-primary" disabled>Applied</button>
                                @else
                                    @if ($isSaved)
                                        <button class="btn btn-secondary me-2" disabled>Saved</button>
                                    @else
                                        <form method="POST" action="{{ route('frontend.savejob', $jobs->id) }}" class="mb-0">
                                            @csrf
                                            <button type='submit' class="btn btn-secondary me-2">Save</button>
                                        </form>
                                    @endif
                               
                            
                                <form method="POST" action="{{ route('frontend.applyjob', $jobs->id) }}" class="mb-0">
                                    @csrf
                                    <button type='submit' class="btn btn-primary">Apply</button>
                                </form>
                                @endif
                            @else
                                <a href="{{ route('frontend.login') }}" class="btn btn-secondary me-2">Login to Save</a>
                                <a href="{{ route('frontend.login') }}" class="btn btn-primary">Login to apply</a>
                            @endif
                            
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow border-0">
                        <div class="job_sumary">
                            <div class="summery_header pb-1 pt-4">
                                <h3>Job Summery</h3>
                            </div>
                            <div class="job_content pt-3">
                                <ul>
                                    <li>Published on: <span>{{ $jobs->created_at->format('d M Y') }}</span></li>
                                    <li>Vacancy: <span>2 Position</span></li>
                                    <li>Salary: <span>{{ $jobs->salary }}</span></li>
                                    <li>Location: <span>{{ $jobs->location }}</span></li>
                                    <li>Job Nature: <span> {{ $jobs->jobType->name }}</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow border-0 my-4">
                        <div class="job_sumary">
                            <div class="summery_header pb-1 pt-4">
                                <h3>Company Details</h3>
                            </div>
                            <div class="job_content pt-3">
                                <ul>
                                    <li>Name: <span>{{ $jobs->company_name }}</span></li>
                                    @if ($jobs->company_location)
                                        <li>Locaion: <span>{{ $jobs->company_location }}</span></li>
                                    @endif
                                    @if ($jobs->company_website)
                                        <li>Webite: <span><a
                                                    href="{{ $jobs->company_website }}">{{ $jobs->company_website }}</a></span>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .heart {
            width: 40px;
            height: 40px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            color: #00D363;
            font-size: 14px;
            line-height: 40px;
            text-align: center;
            display: inline-block;
            background: #EFFDF5;
        }

        .heart:hover {
            background: #00D363;
            color: #fff;
        }
    </style>
@endsection
