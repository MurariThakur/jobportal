@extends('admin.layouts.app')

@section('title', 'Login')

@section('login')

<div class="container d-flex justify-content-center align-items-center min-vh-100 " style="margin-top: 10rem">
    <div class="card p-4" style="width: 100%; max-width: 400px;">
        <div class="alert alert-danger mt-2 d-none" id="invalidError"></div>
        <h2 class="text-center mb-4">Login</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" id='LoginForm'>
            @csrf
            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" >
                <div class="alert alert-danger mt-2 d-none" id="emailError"></div>
            </div>
            <div class="form-group mb-3">
                <label for="password">Password</label>
                <div class="input-group">
                    <input type="password" name="password" id="password" class="form-control" >
                    <div class="input-group-append">
                        <button type="button" class="btn btn-outline-secondary" onclick="togglePassword()">
                            <i class="fa fa-eye-slash" id="togglePasswordIcon"></i>
                        </button>
                    </div>
                </div>
                <div class="alert alert-danger mt-2 d-none" id="passwordError"></div>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
            <div class="text-center mt-2">
                {{-- <a href="{{ route('register') }}">Don't have an account? Register</a> --}}
            </div>
        </form>
    </div>
</div>

<script>
function togglePassword() {
    var passwordField = document.getElementById('password');
    var toggleIcon = document.getElementById('togglePasswordIcon');
    if (passwordField.type === 'password') {
        passwordField.type = 'text';
        toggleIcon.classList.remove('fa-eye-slash');
        toggleIcon.classList.add('fa-eye');
    } else {
        passwordField.type = 'password';
        toggleIcon.classList.remove('fa-eye');
        toggleIcon.classList.add('fa-eye-slash');
    }
}
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    var $j = jQuery.noConflict();
$j(document).ready(function(){
    $j('#LoginForm').on('submit', function(event){
        event.preventDefault();
        
        $j.ajax({
            url: '{{ url('/admin/loginform') }}',
            method: 'POST',
            data: $j(this).serialize(),
            success: function(response){
                if (response.redirect_url) {
                    window.location.href = response.redirect_url;
                }
            },
            error: function(response){
                if (response.status === 422) {
                    var errors = response.responseJSON.errors;

                    if (errors.email) {
                        $j('#emailError').removeClass('d-none').text(errors.email[0]);
                    }
                    if (errors.password) {
                        $j('#passwordError').removeClass('d-none').text(errors.password[0]);
                    }
                } else if (response.status === 401) {
                    $j('#invalidError').removeClass('d-none').text(response.responseJSON.error);
                    // window.location.reload();
                }
            }
        });
    });
});

    </script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@endsection
