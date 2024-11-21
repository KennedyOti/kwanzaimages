@extends('layouts.portal')

@section('content')
    <br><br>
    <div class="container">
        <h1 class="text-center">Teams Management</h1>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close btn-success" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <button class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#addTeamModal">Add New Team Member</button>

        <div class="row">
            @foreach ($teams as $team)
                <div class="col-md-3 mb-4 text-center">
                    <!-- Correct image path used here -->
                    <img src="{{ asset('storage/' . $team->image_path) }}" class="img-fluid mb-2"
                        style="height: 200px; object-fit: cover;">
                    <h5>{{ $team->name }}</h5>
                    <p>{{ $team->role }}</p>
                    <button class="btn btn-warning btn-sm edit-btn" data-id="{{ $team->id }}"
                        data-name="{{ $team->name }}" data-role="{{ $team->role }}" data-bs-toggle="modal"
                        data-bs-target="#editTeamModal">Edit</button>
                    <button class="btn btn-danger btn-sm delete-btn" data-id="{{ $team->id }}">Delete</button>
                </div>
            @endforeach
        </div>

        <!-- Add Team Modal -->
        <div class="modal fade" id="addTeamModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('teams.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Add New Team Member</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <input type="text" name="name" placeholder="Name" class="form-control mb-3" required>
                            <input type="text" name="role" placeholder="Role" class="form-control mb-3" required>
                            <input type="file" name="image" class="form-control mb-3" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Edit Team Modal -->
        <div class="modal fade" id="editTeamModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="" method="POST" id="editTeamForm" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Team Member</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <input type="text" name="name" id="edit-name" class="form-control mb-3" required>
                            <input type="text" name="role" id="edit-role" class="form-control mb-3" required>
                            <input type="file" name="image" class="form-control mb-3">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.delete-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                if (confirm('Delete this team member?')) {
                    fetch(`/teams/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    }).then(res => res.json()).then(data => {
                        if (data.success) location.reload();
                    });
                }
            });
        });

        document.querySelectorAll('.edit-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const name = this.getAttribute('data-name');
                const role = this.getAttribute('data-role');

                document.getElementById('edit-name').value = name;
                document.getElementById('edit-role').value = role;
                document.getElementById('editTeamForm').action = `/teams/${id}`;
            });
        });
    </script>
@endsection
