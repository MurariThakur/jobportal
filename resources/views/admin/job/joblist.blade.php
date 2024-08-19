@extends('admin.layouts.appp')

@section('content')
    <div class="container">
        <h2>Job Type</h2>
        <a href="{{ route('admin.job.create') }}" class="btn btn-primary mb-3">Create Job</a>
        
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Created By</th>
                    <th scope="col">Status</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jobs as $job)
                    <tr>
                        <td>
                            <p>{{ $job->title }}</p>
                            <p>Appicatant: {{ $job->applications->count() }}
                        </td>
                        <td>{{ $job->user->name }}
                        <td>
                            <span class="badge {{ $job->status == 1 ? 'bg-success' : 'bg-primary' }}">
                                {{ $job->status == 1 ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>
                            {{ $job->created_at->format( 'd M Y') }}
                        </td>
                        <td>
                            <a href="{{ route('admin.job.show', $job->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('admin.job.edit', $job->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('admin.job.destroy', $job->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <div class="mt-3 d-flex justify-content-end">
            {{ $jobs->links() }}
        </div>
    </div>
@endsection
