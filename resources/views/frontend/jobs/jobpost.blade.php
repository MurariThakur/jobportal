@extends('frontend.layouts.app')

@section('title', 'jobpost')

@section('main')
    <section class="section-5 bg-2">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Post a Job</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                @include('frontend.profile.sidebar')
                <div class="col-lg-9">
                    <form method="POST" name='jobpost' id='jobpost'>
                        @csrf
                    <div class="card border-0 shadow mb-4 ">
                        <div class="card-body card-form p-4">
                            <h3 class="fs-4 mb-1">Job Details</h3>
                            <div class="row">

                                <div class="col-md-6 mb-4">
                                    <label for="title" class="mb-2">Title<span class="req">*</span></label>
                                    <input type="text" placeholder="Job Title" id="title" name="title"
                                        class="form-control">
                                        <div class="invalid-feedback d-none" id="titleError"></div>
                                </div>
                                <div class="col-md-6  mb-4">
                                    <label for="category" class="mb-2">Category<span class="req">*</span></label>

                                    <select name="category" id="category" class="form-select">
                                        <option value="">Select a Category</option>
                                        @if ($categories)
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <div class="invalid-feedback d-none" id="categoryError"></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="job_nature" class="mb-2">Job Nature<span class="req">*</span></label>
                                    <select class="form-select" name='job_nature' id='job_nature'>
                                        <option value="">Select a Job Type</option>
                                        @if ($jobtypes)
                                            @foreach ($jobtypes as $job)
                                                <option value="{{ $job->id }}">{{ $job->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <div class="invalid-feedback d-none" id="job_natoreError"></div>
                                </div>
                                <div class="col-md-6  mb-4">
                                    <label for="vacancy" class="mb-2">Vacancy<span class="req">*</span></label>
                                    <input type="number" min="1" placeholder="Vacancy" id="vacancy" name="vacancy"
                                        class="form-control">
                                        <div class="invalid-feedback d-none" id="vacancyError"></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-4 col-md-6">
                                    <label for="salary" class="mb-2">Salary</label>
                                    <input type="text" placeholder="Salary" id="salary" name="salary"
                                        class="form-control">
                                </div>

                                <div class="mb-4 col-md-6">
                                    <label for="location" class="mb-2">Location<span class="req">*</span></label>
                                    <input type="text" placeholder="location" id="location" name="location"
                                        class="form-control">
                                        <div class="invalid-feedback d-none" id="locationError"></div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="description" class="mb-2">Description<span class="req">*</span></label>
                                <textarea class="textarea" name="description" id="description" cols="5" rows="5"
                                    placeholder="Description"></textarea>
                                    <div class="invalid-feedback d-none" id="descriptionError"></div>
                            </div>
                            <div class="mb-4">
                                <label for="benefits" class="mb-2">Benefits</label>
                                <textarea class="textarea" name="benefits" id="benefits" cols="5" rows="5" placeholder="Benefits"></textarea>
                            </div>
                            <div class="mb-4">
                                <label for="responsibility" class="mb-2">Responsibility</label>
                                <textarea class="textarea" name="responsibility" id="responsibility" cols="5" rows="5"
                                    placeholder="Responsibility"></textarea>
                            </div>
                            <div class="mb-4">
                                <label for="qualifications" class="mb-2">Qualifications</label>
                                <textarea class="textarea" name="qualifications" id="qualifications" cols="5" rows="5"
                                    placeholder="Qualifications"></textarea>
                            </div>


                            <div class="row">
                            <div class="mb-4 col-md-6">
                                <label for="keywords" class="mb-2">Keywords<span class="req">*</span></label>
                                <input type="text" placeholder="keywords" id="keywords" name="keywords"
                                    class="form-control">
                                    <div class="invalid-feedback d-none" id="keywordsError"></div>
                            </div>
                            <div class="col-md-6  mb-4">
                                <label for="experience" class="mb-2">Experience<span class="req">*</span></label>

                                <select name="experience" id="experience" class="form-select">
                                    <option value="">Select Experience</option>
                                    <option value="1">1 Year</option>
                                    <option value="2">2 Years</option>
                                    <option value="3">3 Years</option>
                                    <option value="4">4 Years</option>
                                    <option value="5">5 Years</option>
                                    <option value="6">6 Years</option>
                                    <option value="7">7 Years</option>
                                    <option value="8">8 Years</option>
                                    <option value="10+">10+ Years</option>
                                </select>
                                <div class="invalid-feedback d-none" id="experienceError"></div>
                            </div>
                        </div>

                            <h3 class="fs-4 mb-1 mt-5 border-top pt-5">Company Details</h3>

                            <div class="row">
                                <div class="mb-4 col-md-6">
                                    <label for="company_name" class="mb-2">Name<span class="req">*</span></label>
                                    <input type="text" placeholder="Company Name" id="company_name"
                                        name="company_name" class="form-control">
                                        <div class="invalid-feedback d-none" id="company_nameError"></div>
                                </div>

                                <div class="mb-4 col-md-6">
                                    <label for="company_location" class="mb-2">Location</label>
                                    <input type="text" placeholder="Location" id="company_location"
                                        name="company_location" class="form-control">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="company_website" class="mb-2">Website</label>
                                <input type="text" placeholder="Website" id="company_website" name="company_website"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="card-footer  p-4">
                            <button type="submit" class="btn btn-primary">Save Job</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
    </section>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        $('#jobpost').on('submit',function(event){
            event.preventDefault();

        $.ajax({
            url:'{{ url('/job-create') }}',
            method:'post',
            data:$(this).serialize(),
            success:function(response){
                window.location.href = response.redirect_url;
            },
            error:function(response){
                if(response.status ==422){
                    var errors = response.responseJSON.errors;

                    $.each(errors, function(key, value){
                            $('#' + key + 'Error').removeClass('d-none').html(value[0]);
                            $('#' + key).addClass('is-invalid');
                        });
                }
                

            },
        });
        });
    });
</script>
