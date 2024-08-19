@extends('admin.layouts.appp')


@section('content')
    <section class="section-5 bg-2">
        <div class="container py-5">
            
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" name='jobpostupdate' id='jobpostupdate'>
                        @csrf
                        @method('put')
                    <div class="card border-0 shadow mb-4 ">
                        <div class="card-body card-form p-4">
                            <h3 class="fs-4 mb-1">Job Edit</h3>
                            <div class="row">

                                <div class="col-md-6 mb-4">
                                    <label for="title" class="mb-2">Title<span class="req">*</span></label>
                                    <input type="text" placeholder="Job Title" id="title" name="title"
                                        class="form-control" value="{{$jobs->title }}">
                                        <div class="invalid-feedback d-none" id="titleError"></div>
                                </div>
                                <div class="col-md-6  mb-4">
                                    <label for="category" class="mb-2">Category<span class="req">*</span></label>

                                    <select name="category" id="category" class="form-select">
                                        <option value="">Select a Category</option>
                                        @if ($categories)
                                            @foreach ($categories as $category)
                                                <option {{ ($jobs->category_id == $category->id) ? 'selected':'' }} value="{{ $category->id }}">{{ $category->name }}</option>
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
                                            @foreach ($jobtypes as $jobtype)
                                                <option {{ ($jobs->job_type_id == $jobtype->id)? 'selected' : "" }} value="{{ $jobtype->id }}">{{ $jobtype->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <div class="invalid-feedback d-none" id="job_natoreError"></div>
                                </div>
                                <div class="col-md-6  mb-4">
                                    <label for="vacancy" class="mb-2">Vacancy<span class="req">*</span></label>
                                    <input type="number" min="1" placeholder="Vacancy" id="vacancy" name="vacancy"
                                        class="form-control" value="{{ $jobs->vacancy }}">
                                        <div class="invalid-feedback d-none" id="vacancyError"></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-4 col-md-6">
                                    <label for="salary" class="mb-2">Salary</label>
                                    <input type="text" placeholder="Salary" id="salary" name="salary"
                                        class="form-control" value="{{ $jobs->salary }}">
                                </div>

                                <div class="mb-4 col-md-6">
                                    <label for="location" class="mb-2">Location<span class="req">*</span></label>
                                    <input type="text" placeholder="location" id="location" name="location"
                                        class="form-control" value="{{ $jobs->location }}">
                                        <div class="invalid-feedback d-none" id="locationError"></div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="description" class="mb-2">Description<span class="req">*</span></label>
                                <textarea class="textarea" name="description" id="description" cols="5" rows="5"
                                    placeholder="Description">{{ $jobs->description }}</textarea>
                                    <div class="invalid-feedback d-none" id="descriptionError"></div>
                            </div>
                            <div class="mb-4">
                                <label for="benefits" class="mb-2">Benefits</label>
                                <textarea class="textarea" name="benefits" id="benefits" cols="5" rows="5" placeholder="Benefits">{{ $jobs->benefits }}</textarea>
                            </div>
                            <div class="mb-4">
                                <label for="responsibility" class="mb-2">Responsibility</label>
                                <textarea class="textarea" name="responsibility" id="responsibility" cols="5" rows="5"
                                    placeholder="Responsibility">{{ $jobs->responsibility }}</textarea>
                            </div>
                            <div class="mb-4">
                                <label for="qualifications" class="mb-2">Qualifications</label>
                                <textarea class="textarea" name="qualifications" id="qualifications" cols="5" rows="5"
                                    placeholder="Qualifications">{{ $jobs->qualifications }}</textarea>
                            </div>


                            <div class="row">
                            <div class="mb-4 col-md-6">
                                <label for="keywords" class="mb-2">Keywords<span class="req">*</span></label>
                                <input type="text" placeholder="keywords" id="keywords" name="keywords"
                                    class="form-control" value="{{ $jobs->keywords }}">
                                    <div class="invalid-feedback d-none" id="keywordsError"></div>
                            </div>
                            <div class="col-md-6  mb-4">
                                <label for="experience" class="mb-2">Experience<span class=""></span></label>

                                <select name="experience" id="experience" class="form-select">
                                    <option value="">Select Experience</option>
                                    <option value="1" {{ ($jobs->experience == 1)? 'selected':"" }}>1 Year</option>
                                    <option value="2" {{ ($jobs->experience == 2)? 'selected':"" }}>2 Years</option>
                                    <option value="3" {{ ($jobs->experience == 3)? 'selected':"" }}>3 Years</option>
                                    <option value="4" {{ ($jobs->experience == 4)? 'selected':"" }}>4 Years</option>
                                    <option value="5" {{ ($jobs->experience == 5)? 'selected':"" }}>5 Years</option>
                                    <option value="6" {{ ($jobs->experience == 6)? 'selected':"" }}>6 Years</option>
                                    <option value="7" {{ ($jobs->experience == 7)? 'selected':"" }}>7 Years</option>
                                    <option value="8" {{ ($jobs->experience == 8)? 'selected':"" }}>8 Years</option>
                                    {{-- <option value="10+" {{ ($jobs->experience ==10_plusd)? 'selected':"" }}>10+ Years</option> --}}
                                </select>
                                <div class="invalid-feedback d-none" id="categoryError"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-4 col-md-6">
                                <label for="status" class="mb-2">Status</label>
                                <select name="status" id="status" class="form-select">
                                    <option value="">Select Status</option>
                                    <option value="1" {{ ($jobs->status == 1)? 'selected':"" }}>Active</option>
                                    <option value="0" {{ ($jobs->status == 0)? 'selected':"" }}>Inactive</option>
                                </select>
                            </div>

                            <div class="mt-4 col-md-6">
                                <div class="form-check">
                                    <input {{ ($jobs->isFeatured == 1) ? 'checked' : '' }} class="form-check-input" type="checkbox" value="1" id="isFeatured" name="isFeatured">
                                    <label class="form-check-label" for="isFeatured">
                                        Featured
                                    </label>
                                </div>
                            </div>
                        </div>

                            <h3 class="fs-4 mb-1 mt-5 border-top pt-5">Company Details</h3>

                            <div class="row">
                                <div class="mb-4 col-md-6">
                                    <label for="company_name" class="mb-2">Name<span class="req">*</span></label>
                                    <input type="text" placeholder="Company Name" id="company_name"
                                        name="company_name" class="form-control" value="{{ $jobs->company_name }}">
                                        <div class="invalid-feedback d-none" id="company_nameError"></div>
                                </div>

                                <div class="mb-4 col-md-6">
                                    <label for="company_location" class="mb-2">Location</label>
                                    <input type="text" placeholder="Location" id="company_location"
                                        name="company_location" class="form-control" value="{{ $jobs->company_location }}">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="company_website" class="mb-2">Website</label>
                                <input type="text" placeholder="Website" id="company_website" name="company_website"
                                    class="form-control" value="{{ $jobs->company_website }}">
                            </div>
                        </div>
                        <div class="card-footer  p-4">
                            <a href="{{ route('admin.job.list') }}" class="btn btn-secondary ">Cancel</a>
                            <button type="submit" class="btn btn-primary">Update Job</button>
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
        $('#jobpostupdate').on('submit',function(event){
            event.preventDefault();

        $.ajax({
            url:'{{ url('/admin/job/edit',$jobs->id) }}',
            method:'put',
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
