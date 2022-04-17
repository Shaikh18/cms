@extends('layouts.app')

@section('content')

    <div class="card card-default">
        <div class="card-header">
           {{ (isset($category) ? 'Edit Categories' : 'Create Categories') }}

        </div>
        <div class="card-body">
            <form action="{{ ( isset($category) ? route('categories.update', $category->id) : route('categories.store')) }}" method="Post">
                @csrf
                @if(isset($category))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ ( isset($category) ? $category->name : '' ) }}">
                </div>
                @error('name')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
                <div class="form-group mt-4">

                    <button class="btn btn-outline-primary btn-sm">
                        {{ ( isset($category) ? 'Update Category' : 'Create Category ' ) }}
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
