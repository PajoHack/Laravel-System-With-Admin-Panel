@extends('layouts.admin')



@section('content')

    <h1>Posts</h1>

    <table class="table">

        <thead>
          <tr>
              <th>Post ID</th>
              <th>Photo</th>
              <th>Owner</th>
              <th>Category ID</th>
              <th>Title</th>
              <th>Body</th>
              <th>Created</th>
              <th>Updated</th>
          </tr>
        </thead>

        <tbody>

            @if('posts')

                @foreach($posts as $post)

                  <tr>
                      <td>{{ $post->id }}</td>
                      <td><img height="50" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400' }} " alt=""></td>
                      <td>{{ $post->user->name }}</td>
                      <td>{{ $post->category ? $post->category->name : "Not Categorised" }}</td>
                      <td><a href="{{ route('admin.posts.edit', $post->id) }}">{{ $post->title }}</a></td>
                      <td>{{ str_limit($post->body, 7) }}</td>
                      <td>{{ $post->created_at->diffForHumans() }}</td>
                      <td>{{ $post->updated_at->diffForHumans() }}</td>
                      <td><a href="{{ route('home.post', $post->id) }}">View Post</a></td>
                      <td><a href="{{ route('admin.comments.show', $post->id) }}">View Comments</a></td>
                  </tr>

                @endforeach

            @endif

        </tbody>

      </table>

    @endsection