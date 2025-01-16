@extends('admin.dashboard')

@section('content')
<div class="full-width-div">
    <h1>Users</h1>
</div>

<table id="admin--user">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($users as $user)
            <tr class="role-{{ strtolower($user->role) }}">
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td class="actions">
                    <a href="{{ route('ad_user.edit', $user->id) }}">
                        <i class="fa-regular fa-pen-to-square"></i> Edit
                    </a>
                    <form action="{{ route('ad_user.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit">
                            <i class="fa-solid fa-trash-can"></i> Delete
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" style="text-align: center;">No users found.</td>
            </tr>
        @endforelse
    </tbody>
</table>
<a href="{{route('ad_user.create')}}">
    <div class="admin_create">
        <i class="fa-solid fa-plus"></i> Add User
    </div>
</a>

@endsection