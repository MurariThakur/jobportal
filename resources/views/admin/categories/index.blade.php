
@extends('admin.layouts.appp')

@section('content')
    <div class="container">
        <h2>Categories</h2>
        <a href="{{ route('admin.category.create') }}" class="btn btn-primary mb-3">Create Category</a>
        
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>
                            <span class="badge {{ $category->status == 1 ? 'bg-success' : 'bg-primary' }}">
                                {{ $category->status == 1 ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.category.show', $category->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST" style="display: inline-block;">
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
            {{ $categories->links()}}
        </div>
    </div>
@endsection
