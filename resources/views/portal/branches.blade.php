@extends('layouts.portal')

@section('content')
    <div class="container">
        <h1 class="text-center text-primary mb-4">Manage Branches</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Add Branch Form -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">Add New Branch</div>
            <div class="card-body">
                <form action="{{ route('branches.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="name" class="form-label">Branch Name</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" name="location" id="location" class="form-control" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="contact" class="form-label">Contact</label>
                            <input type="text" name="contact" id="contact" class="form-control" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Branch</button>
                </form>
            </div>
        </div>

        <!-- Branches Table -->
        <div class="card">
            <div class="card-header bg-primary text-white">Branches</div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Location</th>
                            <th>Contact</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($branches as $branch)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $branch->name }}</td>
                                <td>{{ $branch->location }}</td>
                                <td>{{ $branch->contact }}</td>
                                <td>
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#editBranchModal{{ $branch->id }}">Edit</button>
                                    <form action="{{ route('branches.destroy', $branch->id) }}" method="POST"
                                        style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Edit Modal -->
                            <div class="modal fade" id="editBranchModal{{ $branch->id }}" tabindex="-1"
                                aria-labelledby="editBranchModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary text-white">
                                            <h5 class="modal-title" id="editBranchModalLabel">Edit Branch</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('branches.update', $branch->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Branch Name</label>
                                                    <input type="text" name="name" class="form-control"
                                                        value="{{ $branch->name }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="location" class="form-label">Location</label>
                                                    <input type="text" name="location" class="form-control"
                                                        value="{{ $branch->location }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="contact" class="form-label">Contact</label>
                                                    <input type="text" name="contact" class="form-control"
                                                        value="{{ $branch->contact }}" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
