
@extends('admin.layouts.appp')

@section('content')
    <div class="container">
        <h2>Users</h2>
        {{-- <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Create Category</a> --}}
        
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Role</th>
                    <th>Designation</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->mobile }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->Designation }}</td>
                        {{-- <td>
                            <a href="{{ route('categories.show', $category) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('categories.edit', $category) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <div class="mt-3 d-flex justify-content-end">
           {{ $users->links() }}
        </div>
    </div>
@endsection
