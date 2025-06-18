@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Danh sách Users</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>User ID</th>
                <th>Avatar</th>
                <th>Email</th>
                <th>Full Name</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->user_id }}</td>
                <td><img src="{{ $user->avatar_url }}" width="50" /></td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->full_name }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->address }}</td>
                <td>{{ $user->role }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection