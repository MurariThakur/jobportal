@extends('admin.layouts.appp')

@section('content')
    <div class="container">
        <h2>Create Category</h2>
        <form method="POST" id='categorycreate'>
            @csrf
            <div class="form-group mb-4">
                <label for="name">Category Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                <div class="invalid-feedback d-none" id="nameError"></div>
            </div>
            <div class="form-group mb-2">
                <label for="status">Status</label>
                <Select class="form-select" aria-label="Default select example" name="status" id='status'>
                    <option value="">Select Status</option>
                    <option value="1">Active</option>
                    <option value="0">InActive</option>
                </Select>
                <div class="invalid-feedback d-none" id="statusError"></div>
            </div>
            <a href="{{ route('admin.category') }}" class="btn btn-secondary me-2 mt-2">Cancel</a>
            <button type="submit" class="btn btn-primary mt-2">Create</button>
            {{-- </form> --}}
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#categorycreate').on('submit', function(event) {
                event.preventDefault();

                $.ajax({
                    url: '{{ url('/admin/category/create') }}',
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        window.location.href = response.redirect_url;
                    },
                    error: function(response) {
                        if (response.status == 422) {
                            var errors = response.responseJSON.errors;

                            $.each(errors, function(key, value) {
                                $('#' + key + 'Error').removeClass('d-none').html(value[
                                    0]);
                                $('#' + key).addClass('is-invalid');
                            });
                        }
                    }
                })
            })
        })
    </script>
@endsection
