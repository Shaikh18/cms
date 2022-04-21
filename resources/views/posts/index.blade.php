@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-end mb-2">
        <a href="{{route('posts.create') }}" class="btn btn-success btn-sm">Add Post</a>
    </div>
    <div class="card card-default">
        <div class="card-header">
            Posts
        </div>
        <div class="card-body">
            @if($posts->count() > 0)
                <table class="table">
                    <thead>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td style="width: 30%">
                                <img src="{{ asset('storage/'.$post->image) }}" style="width: 50%">
                            </td>
                            <td>{{ $post->title }}</td>
                            <td>
                                @if($post->trashed())
                                    <form method="POST" action="{{ route('restore', $post->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-info btn-sm">Restore</button>
                                    </form>
                                @else
                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info btn-sm">Edit</a>
                                @endif
                                <form action="{{ route('posts.destroy', $post->id) }}" method="Post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="mt-2 btn btn-danger btn-sm">
                                        {{ $post->trashed() ? 'Delete': 'Trash' }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <p>No Posts Yet!</p>
            @endif
        </div>
    </div>
@endsection
