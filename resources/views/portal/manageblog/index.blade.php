@extends('layouts.portal')


@section('content')
    <div class="container mt-5">
        <h1>Manage Blogs</h1>
        <a href="{{ route('manageblog.create') }}" class="btn btn-success mb-3">Create New Blog</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $blog)
                    <tr>
                        <td>{{ $blog->title }}</td>
                        <td>{{ $blog->author }}</td>
                        <td>
                            <a href="{{ route('manageblog.edit', $blog->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('manageblog.destroy', $blog->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
