@extends('layouts.admin')



@section('content')

    <h1>Media</h1>

    @if($photos)

    <table class="table">

        <thead>

          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Uploaded</th>
          </tr>

        </thead>

        <tbody>

        @foreach($photos as $photo)

          <tr>
            <td>{{ $photo->id }}</td>
            <td><img height="50" src="{{ $photo->file }}" alt=""></td>
            <td>{{ $photo->created_at->diffForHumans() ? $photo->created_at->diffForHumans() : 'No Date' }}</td>
              <td>

                  {!! Form::open(['method'=>'DELETE', 'action' => ['AdminMediasController@destroy', $photo->id]]) !!}


                  <div class="form-group">
                      {!! Form::submit('DELETE', ['class'=>'btn btn-danger']) !!}
                  </div>


                  {!! Form::close() !!}

              </td>
          </tr>

        @endforeach

        </tbody>

      </table>

    @endif

    @endsection