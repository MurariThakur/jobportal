@extends('frontend.layouts.app')

@section('title', 'home')

@section('main')
    @if (session('success'))
        <div id="success-popup" class="popup-message">
            {{ session('success') }}
        </div>
    @endif
    {{-- Banner --}}
    <section class="section-0 lazy d-flex bg-image-style dark align-items-center " class=""
        data-bg="assets/images/banner5.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12 col-xl-8">
                    <h1>Find your dream job</h1>
                    <p>Thounsands of jobs available.</p>
                    <div class="banner-btn mt-5"><a href="#" class="btn btn-primary mb-4 mb-sm-0">Explore Now</a></div>
                </div>
            </div>
        </div>
    </section>

    {{-- search box --}}
    <section class="section-1 py-5 ">
        <div class="container">
            <div class="card border-0 shadow p-5">
                <form action="{{ route('frontend.job') }}" method="GET">
                <div class="row">
                    <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                        <input type="text" class="form-control" name="Keywords" id="Keywords" placeholder="Keywords">
                    </div>
                    <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                        <input type="text" class="form-control" name="location" id="location" placeholder="Location">
                    </div>
                    <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                        <select name="category" id="category" class="form-control">
                            <option value="">Select a Category</option>
                            @if($homecategories)
                            @foreach($homecategories as $homecategory)
                            <option value="{{ $homecategory->id }}">{{ $homecategory->name }}</option>
                            @endforeach
                           @endif
                        </select>
                    </div>

                    <div class=" col-md-3 mb-xs-3 mb-sm-3 mb-lg-0">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-block">Search</button>
                        </div>

                    </div>
                </div>
            </form>
            </div>
        </div>
    </section>

    {{-- Popular categeory --}}
    <section class="section-2 bg-2 py-5">
        <div class="container">
            <h2>Popular Categories</h2>
            <div class="row pt-5">
                @if($categories)
                @foreach($categories as $category)
                <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="single_catagory">
                        <a href="{{ route('frontend.job').'?category='.$category->id }}">
                            <h4 class="pb-2">{{ $category->name }}</h4>
                        </a>
                        <p class="mb-0"> <span>50</span> Available position</p>
                    </div>
                </div>
                @endforeach
               @endif
            </div>
        </div>
    </section>

    {{-- Featured Jobs --}}
    <section class="section-3  py-5">
        <div class="container">
            <h2>Featured Jobs</h2>
            <div class="row pt-5">
                <div class="job_listing_area">
                    <div class="job_lists">
                        @if($featurejobs)
                        <div class="row">
                            @foreach($featurejobs as $featurejob )
                            <div class="col-md-4">
                                <div class="card border-0 p-3 shadow mb-4">
                                    <div class="card-body">
                                        <h3 class="border-0 fs-5 pb-2 mb-0">{{ $featurejob->title }}</h3>
                                        <p>{{ Str::words($featurejob->description, 5) }}</p>
                                        <div class="bg-light p-3 border">
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-map-marker"></i></span>
                                                <span class="ps-1">{{ $featurejob->location }}</span>
                                            </p>
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-clock-o"></i></span>
                                                <span class="ps-1">{{ $featurejob->jobType->name }}</span>
                                            </p>
                                            @if($featurejob->salary)
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-usd"></i></span>
                                                <span class="ps-1">{{ $featurejob->salary }}</span>
                                            </p>
                                            @endif
                                        </div>

                                        <div class="d-grid mt-3">
                                            <a href="{{ route('frontend.jobdetail',$featurejob->id) }}" class="btn btn-primary btn-lg">Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- latest jobs --}}
    <section class="section-3 bg-2 py-5">
        <div class="container">
            <h2>Latest Jobs</h2>
            <div class="row pt-5">
                <div class="job_listing_area">
                    <div class="job_lists">
                        <div class="row">
                            @if($latestjobs)
                            @foreach($latestjobs as $latestjob)
                            <div class="col-md-4">
                                <div class="card border-0 p-3 shadow mb-4">
                                    <div class="card-body">
                                        <h3 class="border-0 fs-5 pb-2 mb-0">{{ $latestjob->title }}</h3>
                                        <p>{{ Str::words($latestjob->description, 5) }}</p>
                                        <div class="bg-light p-3 border">
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-map-marker"></i></span>
                                                <span class="ps-1">{{ $latestjob->location }}</span>
                                            </p>
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-clock-o"></i></span>
                                                <span class="ps-1">{{ $latestjob->jobType->name }}</span>
                                            </p>
                                            @if($latestjob->salary)
                                            <p class="mb-0">
                                                <span class="fw-bolder"><i class="fa fa-usd"></i></span>
                                                <span class="ps-1">{{ $latestjob->salary }}</span>
                                            </p>
                                            @endif
                                        </div>

                                        <div class="d-grid mt-3">
                                            <a href="{{ route('frontend.jobdetail',$latestjob->id) }}" class="btn btn-primary btn-lg">Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

<style>
    .popup-message {
        position: fixed;
        top: 80px;
        right: 20px;
        background-color: #28a745;
        color: white;
        padding: 15px 20px;
        border-radius: 5px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        z-index: 1000;
        opacity: 0;
        transform: translateY(-20px);
        transition: opacity 0.5s, transform 0.5s;
    }

    .popup-message.show {
        opacity: 1;
        transform: translateY(0);
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var popup = document.getElementById("success-popup");
        if (popup) {
            popup.classList.add("show");
            setTimeout(function() {
                popup.classList.remove("show");
            }, 2000); // The popup will disappear after 5 seconds
        }
    });
</script>
