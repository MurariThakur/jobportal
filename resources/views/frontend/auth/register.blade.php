@extends('frontend.layouts.app')

@section('main')
    <section class="section-5">
        <div class="container my-5">
            <div class="py-lg-2">&nbsp;</div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-5">
                    <div class="card shadow border-0 p-5">
                        <h1 class="h3">Register</h1>
                        <form id="registrationForm">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="mb-2">Name*</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    placeholder="Enter Name" value="{{ old('name') }}">
                                <div class="alert alert-danger mt-2 d-none" id="nameError"></div>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="mb-2">Email*</label>
                                <input type="text" name="email" id="email" class="form-control"
                                    placeholder="Enter Email" value="{{ old('email') }}">
                                <div class="alert alert-danger mt-2 d-none" id="emailError"></div>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="mb-2">Password*</label>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Enter Password">
                                <div class="alert alert-danger mt-2 d-none" id="passwordError"></div>
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="mb-2">Confirm Password*</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control" placeholder="Enter Password">
                                <div class="alert alert-danger mt-2 d-none" id="passwordConfirmationError"></div>
                            </div>

                            <button type="submit" class="btn btn-primary mt-2">Register</button>
                        </form>
                    </div>
                    <div class="mt-4 text-center">
                        <p>Have an account? <a href="{{ route('frontend.login') }}">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

   
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#registrationForm').on('submit', function(event) {
                event.preventDefault(); // Prevent the default form submission

                // Clear previous errors
                $('.alert-danger').addClass('d-none').text('');

                $.ajax({
                    url: '{{ url('registeration') }}', // Adjust URL as needed
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        // Redirect to the home page or show a success message
                        window.location.href = response.redirect_url;
                    },
                    error: function(response) {
                        if (response.status === 422) {
                            // Validation error occurred
                            var errors = response.responseJSON.errors;

                            if (errors.name) {
                                $('#nameError').removeClass('d-none').text(errors.name[0]);
                            }

                            if (errors.email) {
                                $('#emailError').removeClass('d-none').text(errors.email[0]);
                            }

                            if (errors.password) {
                                $('#passwordError').removeClass('d-none').text(errors.password[
                                    0]);
                            }

                            if (errors.password_confirmation) {
                                $('#passwordConfirmationError').removeClass('d-none').text(
                                    errors.password_confirmation[0]);
                            }
                        }
                    }
                });
            });
        });
    </script>
@endsection
