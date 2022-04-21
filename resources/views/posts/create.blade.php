@extends('layouts.app')

@section('content')

    <div class="card card-default">
        <div class="card-header">
            {{ (isset($post) ? 'Edit Post' : 'Create Post') }}
        </div>
        <div class="card-body">
            <form action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store') }}" method="Post" enctype="multipart/form-data">
                @csrf
                @if(isset($post))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ (isset($post) ? $post->title : '') }}">
                    @error('title')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea type="text" name="description" id="description" class="form-control">{{ (isset($post) ? $post->description : '') }}</textarea>
                    @error('description')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <input id="content" type="hidden" name="content" value="{{ (isset($post) ? $post->content : '') }}">
                    <trix-editor input="content"></trix-editor>
                    @error('content')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                @if(isset($post))
                    <img src="{{ asset('storage/'.$post->image) }}" style="width: 50%">
                @endif
                <div class="form-group">
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" class="form-control" value="">
                    @error('image')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="published_at">Published at</label>
                    <input type="text" name="published_at" id="published_at" class="form-control" value="{{ (isset($post) ? $post->published_at : '') }}">
                    @error('published_at')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-4">
                    <input type="submit" class="btn btn-outline-primary btn-sm" value="{{ (isset($post) ? 'Update Post' : 'Create Post') }}">
                </div>
            </form>
        </div>
    </div>
    <script>
        flatpickr('#published_at', {
            enableTime: true
        });
    </script>
@endsection
