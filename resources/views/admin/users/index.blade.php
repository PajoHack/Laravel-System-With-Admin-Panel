@extends('layouts.admin')



@section('content')

    @if(Session::has('deleted_user'))

        <p class="bg-danger">{{ session('deleted_user') }}</p>

        @endif

    <h1>Users</h1>

    <table class="table">

        <thead>
          <tr>
            <th>ID</th>
              <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
              <th>Role</th>
              <th>Status</th>
              <th>Created</th>
              <th>Updated</th>
          </tr>
        </thead>

        @if($users)

            @foreach($users as $user)

        <tbody>
          <tr>
            <td>{{ $user->id }}</td>
              {{--<td><img height="50" src="{{ $user->photo ? $user->photo->file : 'Image not avaiable'}}" alt=""></td>--}}
              <td><img height="50" src="{{ $user->photo ? $user->photo->file : '/images/placeholder.jpg' }}" alt=""></td>
            <td><a href="{{ route('admin.users.edit', $user->id) }}">{{ $user->name }}</a></td>
            <td>{{ $user->email }}</td>
              <td>{{ $user->role->name }}</td>
              {{--<td>{‌{$user->role->name == $user->role->name ? $user->role->name : 'User has no role'}}</td>--}}
              <td>{{ $user->is_active == 1 ? 'Active' : 'Not Active' }}</td>
              <td>{{ $user->created_at->diffForHumans() }}</td>
              <td>{{ $user->updated_at->diffForHumans() }}</td>
          </tr>
        </tbody>

            @endforeach

        @endif

      </table>

    @endsection