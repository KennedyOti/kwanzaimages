@extends('layouts.portal')

@section('content')
    <div class="container">
        <h1>Manage Bookings</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Full Names</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Service</th>
                    <th>Location</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $booking->full_names }}</td>
                        <td>{{ $booking->email }}</td>
                        <td>{{ $booking->phone }}</td>
                        <td>{{ $booking->service }}</td>
                        <td>{{ $booking->location }}</td>
                        <td>{{ $booking->date }}</td>
                        <td>
                            <span class="badge {{ $booking->status == 'confirmed' ? 'badge-success' : 'badge-secondary' }}">
                                {{ ucfirst($booking->status) }}
                            </span>
                        </td>
                        <td>
                            <!-- Edit Booking -->
                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#editModal-{{ $booking->id }}">Edit</button>

                            <!-- Delete Booking -->
                            <form action="{{ route('managebookings.destroy', $booking->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>

                            <!-- Confirm Booking -->
                            @if ($booking->status != 'confirmed')
                                <form action="{{ route('managebookings.confirm', $booking->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">Confirm</button>
                                </form>
                            @endif
                        </td>
                    </tr>

                    <!-- Edit Modal -->
                    <div class="modal fade" id="editModal-{{ $booking->id }}" tabindex="-1"
                        aria-labelledby="editModalLabel-{{ $booking->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="{{ route('managebookings.update', $booking->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel-{{ $booking->id }}">Edit Booking</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group mb-3">
                                            <label for="full_names">Full Names</label>
                                            <input type="text" name="full_names" id="full_names" class="form-control"
                                                value="{{ $booking->full_names }}" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" id="email" class="form-control"
                                                value="{{ $booking->email }}" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="phone">Phone</label>
                                            <input type="text" name="phone" id="phone" class="form-control"
                                                value="{{ $booking->phone }}" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="service">Service</label>
                                            <input type="text" name="service" id="service" class="form-control"
                                                value="{{ $booking->service }}" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="location">Location</label>
                                            <input type="text" name="location" id="location" class="form-control"
                                                value="{{ $booking->location }}" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="date">Date</label>
                                            <input type="datetime-local" name="date" id="date" class="form-control"
                                                value="{{ $booking->date }}" required>
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
@endsection
