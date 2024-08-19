@extends('admin.layouts.appp')

@section('content')
    <div class="container">
        <h2>Create Job Type</h2>
        <form method="POST" action="{{ url('admin/jobtype/create') }}">
            @csrf
            <div class="form-group mb-4">
                <label for="name">Job Type</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                {{-- <div class="invalid-feedback d-none" id="nameError"></div> --}}
                @error('name')
                  <p style="color: red">  {{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="status">Status</label>
                <Select class="form-select" aria-label="Default select example" name="status" id='status'>
                    <option value="">Select Status</option>
                    <option value="1">Active</option>
                    <option value="0">InActive</option>
                </Select>
                @error('status')
                  <p style="color: red">  {{ $message }}</p>
                @enderror
                {{-- <div class="invalid-feedback d-none" id="statusError"></div> --}}
            </div>
            <a href="{{ route('admin.jobtype') }}" class="btn btn-secondary me-2 mt-2">Cancel</a>
            <button type="submit" class="btn btn-primary mt-2">Create</button>
            </form>
    </div>
   
@endsection
