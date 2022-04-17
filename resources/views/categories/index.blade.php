@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-end mb-2">
        <a href="{{route('categories.create') }}" class="btn btn-success btn-sm">Add Category</a>
    </div>
    <div class="card card-default">
        <div class="card-header">
            Categories
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <th>Name</th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>
                                {{$category->name}}
                            </td>
                            <td>
                                <a href="{{ route('categories.edit',$category->id) }}" class="btn btn-info btn-sm text-white float-end">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                                    @csrf
                                    @method('Delete')
                                    <input value="Delete" type="submit" class="btn btn-danger btn-sm text-white float-end">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Modal -->
{{--    <form action="" method="post" id="deleteCategory">--}}
{{--        @csrf--}}
{{--        @method('DELETE')--}}
{{--        <div class="modal fade" id="exampleModal">--}}
{{--            <div class="modal-dialog" role="document">--}}
{{--                <div class="modal-content">--}}
{{--                    <div class="modal-header">--}}
{{--                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>--}}
{{--                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                            <span aria-hidden="true">&times;</span>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                    <div class="modal-body">--}}

{{--                    </div>--}}
{{--                    <div class="modal-footer">--}}
{{--                        <input type="button" class="btn btn-primary" value="Delete">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </form>--}}
@endsection
@section('scripts')
{{--    <script>--}}
{{--        function handleDelete(id)--}}
{{--        {--}}
{{--            var form = document.getElementById('deleteCategory');--}}
{{--            form.action = '/categories/' + id--}}
{{--            console.log('deleting', form);--}}
{{--            $('#exampleModal').modal('show');--}}
{{--        }--}}
{{--    </script>--}}
@endsection
