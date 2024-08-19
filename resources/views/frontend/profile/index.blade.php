@extends('frontend.layouts.app')

@section('title', 'myaccount')

@section('main')
    <section class="section-5 bg-2">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Account Settings</li>
                        </ol>
                    </nav>
                </div>
            </div>
            @include('frontend.layouts.message')
            <div class="row">
                @include('frontend.profile.sidebar')
                <div class="col-lg-9">
                    <div class="card border-0 shadow mb-4">
                        <form action="" method="POST" name='profileupdate' id='profileupdate'>
                            @csrf
                            @method('put')
                            <div class="card-body  p-4">
                                <h3 class="fs-4 mb-1">My Profile</h3>

                                <div class="mb-4">
                                    <label for="name" class="mb-2">Name*</label>
                                    <input type="text" name='name' id='name' placeholder="Enter Name"
                                        class="form-control" value="{{ $user->name }}">
                                    <div class="alert alert-danger mt-2 d-none" id="nameError"></div>
                                </div>
                                <div class="mb-4">
                                    <label for="email" class="mb-2">Email*</label>
                                    <input type="text" name='email' id='email' placeholder="Enter Email"
                                        class="form-control" value="{{ $user->email }}">
                                    <div class="alert alert-danger mt-2 d-none" id="emailError"></div>
                                </div>
                                <div class="mb-4">
                                    <label for="designation" class="mb-2">Designation*</label>
                                    <input type="text" name='designation' id='designation' placeholder="Designation"
                                        class="form-control" value="{{ $user->designation }}">
                                    <div class="alert alert-danger mt-2 d-none" id="designationError"></div>
                                </div>
                                <div class="mb-4">
                                    <label for="mobile" class="mb-2">Mobile*</label>
                                    <input type="text" name='mobile' id='mobile' placeholder="Mobile"
                                        class="form-control" value="{{ $user->mobile }}">
                                    <div class="alert alert-danger mt-2 d-none" id="mobileError"></div>
                                </div>

                            </div>
                            <div class="card-footer  p-4">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>

                    <div class="card border-0 shadow mb-4">
                        <form action="" name='passwordchange' id='passwordchange'>
                            @csrf
                            @method('put')
                            <div class="card-body p-4">
                                <h3 class="fs-4 mb-1">Change Password</h3>
                                <div class="mb-4">
                                    <label for="old_password" class="mb-2">Old Password*</label>
                                    <input type="password" name='old_password' id='old_password' placeholder="Old Password"
                                        class="form-control">
                                        <div class="alert alert-danger mt-2 d-none" id="oldpasswordError"></div>
                                </div>
                                <div class="mb-4">
                                    <label for="new_password" class="mb-2">New Password*</label>
                                    <input type="password" name='new_password' id='new_password' placeholder="New Password"
                                        class="form-control">
                                        <div class="alert alert-danger mt-2 d-none" id="newpasswordError"></div>
                                </div>
                                <div class="mb-4">
                                <label for="password_confirmation" class="mb-2">Confirm Password*</label>
                                <input type="password" name='new_password_confirmation' id='password_confirmation' placeholder="Confirm Password" class="form-control">
                                <div class="alert alert-danger mt-2 d-none" id="confirmpasswordError"></div>
                            </div>
                            </div>
                            <div class="card-footer  p-4">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#profileupdate').on('submit', function(event) {
            event.preventDefault();


            $('.alert-danger').addClass('d-none').text('');

            $.ajax({
                url: '{{ url('/updateProfile') }}',
                method: 'put',
                data: $(this).serialize(),
                success: function(response) {
                    window.location.href = response.redirect_url;
                },
                error: function(response) {
                    if (response.status == 422) {
                        var errors = response.responseJSON.errors

                        if (errors.name) {
                            $('#nameError').removeClass('d-none').text(errors.name[0]);
                        }
                        if(errors.email){
                            $('#emailError').removeClass('d-none').text(errors.email[0]);
                        }
                        if (errors.designation) {
                            $('#designationError').removeClass('d-none').text(errors
                                .designation[0]);
                        }
                        if (errors.mobile) {
                            $('#mobileError').removeClass('d-none').text(errors.mobile[0]);
                        }
                    } else if (response.status === 401) {
                        $('#invalidError').removeClass('d-none').text(response.responseJSON
                            .errors);
                    }
                }
            });
        });

    });
</script>

<script>
$(document).ready(function(){
    $('#passwordchange').on('submit',function(e){
        e.preventDefault();

        $('.alert-danger').addClass('d-none').text('');

        $.ajax({
            url: '{{ url('/passwordChange') }}',
            method:'put',
            data:$(this).serialize(),
            success:function(response){
                window.location.href= response.redirect_url;
            },
            error:function(response){
                if(response.status==422){
                    var errors = response.responseJSON.errors

                
                    if (errors.old_password) {
                            $('#oldpasswordError').removeClass('d-none').text(errors.old_password);
                        }
                    if(errors.new_password){
                        $('#newpasswordError').removeClass('d-none').text(errors.new_password);
                    }
                    if(errors.password_confirmation){
                        $('#confirmpasswordError').removeClass('d-none').text(errors.password_confirmation);
                    }
                }
            }   
        });
    });
});

</script>
