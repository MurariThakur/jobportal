@extends('frontend.layouts.app')

@section('main')
    <section class="section-5">
        <div class="container my-5">
            <div class="py-lg-2">&nbsp;</div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-5">
                    <div class="card shadow border-0 p-5">
                        @include('frontend.layouts.message')
                        <div class="alert alert-danger mt-2 d-none" id="invalidError"></div>
                        <h1 class="h3">Login</h1>
                        <form action="" id='loginform'>
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="mb-2">Email*</label>
                                <input type="text" name="email" id="email" class="form-control"
                                    placeholder="example@example.com" value="{{ old('email') }}">
                                    <div class="alert alert-danger mt-2 d-none" id="emailError"></div>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="mb-2">Password*</label>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Enter Password">
                                    <div class="alert alert-danger mt-2 d-none" id="passwordError"></div>
                            </div>
                            <div class="justify-content-between d-flex">
                                <button type="submit" class="btn btn-primary mt-2">Login</button>
                                <a href="{{ route('account.forgotPassword') }}" class="mt-3">Forgot Password?</a>
                            </div>
                        </form>
                    </div>
                    <div class="mt-4 text-center">
                        <p>Do not have an account? <a href="{{ route('frontend.register') }}">Register</a></p>
                    </div>
                </div>
            </div>
            <div class="py-lg-5">&nbsp;</div>
        </div>
    </section>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('#loginform').on('submit', function(event) {
            event.preventDefault(); 
          
            $('.alert-danger').addClass('d-none').text('');

            $.ajax({
                url: '{{ url('/loginform') }}',
                method:'POST',
                data: $(this).serialize(),
                success:function(response){
                    window.location.href = response.redirect_url;
                },
                error:function(response){
                    if (response.status === 422){
                        var errors = response.responseJSON.errors

                        if(errors.email){
                            $('#emailError').removeClass('d-none').text(errors.email[0]);
                        }
                        if(errors.password){
                            $('#passwordError').removeClass('d-none').text(errors.password[0]);
                        }
                    }
                    else if(response.status === 401) {
                        $('#invalidError').removeClass('d-none').text(response.responseJSON.error);
                    }
                }
            });
            
        });
    });
</script>
