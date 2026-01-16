
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
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->mobile }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->designation }}</td>
                        <td>
                            <form action="{{ route('admin.user.role', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <select name="role" class="form-select form-select-sm d-inline-block w-auto" onchange="this.form.submit()">
                                    <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <div class="mt-3 d-flex justify-content-end">
           {{ $users->links() }}
        </div>
    </div>
@endsection
