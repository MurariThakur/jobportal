
@extends('admin.layouts.appp')

@section('content')
    <div class="container">
        <h2>Edit Job Type</h2>
        <form  method="POST" action="{{ url('admin/jobtype/update',$jobtype->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group mb-4">
                <label for="name">Job Type Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $jobtype->name }}">
                <div class="invalid-feedback d-none" id="nameError"></div>
            </div>
            <div class="form-group mb-2">
                <label for="status">Status</label>
                <Select class="form-select" aria-label="Default select example" name="status" id='status'>
                    <option value="">Select Status</option>
                    <option value="1" {{ $jobtype->status == 1 ?'selected' : "" }}>Active</option>
                    <option value="0" {{ $jobtype->status == 0 ?'selected' : "" }}>InActive</option>
                </Select>
                <div class="invalid-feedback d-none" id="statusError"></div>
            </div>
            <a href="{{ route('admin.jobtype') }}" class="btn btn-secondary me-2 mt-2">Cancel</a>
            <button type="submit" class="btn btn-primary mt-2">Update</button>
        </form>
    </div>
@endsection
