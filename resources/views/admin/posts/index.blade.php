@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="d-flex">
            <h1>Lista dei post</h1>
            <div style="margin-left: 20px"> </div>
            <a class="btn btn-success" href="{{route('admin.posts.create', $posts)}}">CREATE</a>

        </div>

        <table class="table">
            <thead>

              <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">slug</th>
                <th scope="col">Tag</th>
                <th scope="col">Bottoni</th>

              </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
              <tr>
                <th scope="row">{{$post->id}}</th>
                <td>{{$post->title}}</td>
                <td>{{$post->category ? $post->category->name: '-'}}</td>
                <td>{{$post->slug}}</td>
                <td>
                  @forelse ($post->tags as $tag)
                      {{$tag->name}}
                  @empty
                      -
                  @endforelse
                 
                </td>
          
                <td>
                    <a class="btn btn-primary" href="{{route('admin.posts.show', $post)}}">SHOW</a>
                    <a class="btn btn-warning" href="{{route('admin.posts.edit', $post)}}">EDIT</a>
                    <form onsubmit="return confirm('vuoi eliminare il campo?')" class="d-inline" action="" method="POST">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger" >DELETE</a>
                        </form>

                </td>

            </tr>
            @endforeach
            </tbody>
          </table>


    </div>
@endsection