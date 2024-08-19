
@extends('admin.layouts.appp')

@section('content')
    <div class="container">
        <h2>Edit Category</h2>
        <form  method="POST" id='categoryedit'>
            @csrf
            @method('PUT')
            <div class="form-group mb-4">
                <label for="name">Category Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}">
                <div class="invalid-feedback d-none" id="nameError"></div>
            </div>
            <div class="form-group mb-2">
                <label for="status">Status</label>
                <Select class="form-select" aria-label="Default select example" name="status" id='status'>
                    <option value="">Select Status</option>
                    <option value="1" {{ $category->status == 1 ?'selected' : "" }}>Active</option>
                    <option value="0" {{ $category->status == 0 ?'selected' : "" }}>InActive</option>
                </Select>
                <div class="invalid-feedback d-none" id="statusError"></div>
            </div>
            <a href="{{ route('admin.category') }}" class="btn btn-secondary me-2 mt-2">Cancel</a>
            <button type="submit" class="btn btn-primary mt-2">Update</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#categoryedit').on('submit', function(event) {
                event.preventDefault();

                $.ajax({
                    url: '{{ route('admin.category.update',$category->id) }}',
                    method: 'PUT',
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
