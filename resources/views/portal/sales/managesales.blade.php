@extends('layouts.portal')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-mt-5">
                <h1>Sales Management</h1>
                <div class="card">
                    <div class="card-header">
                        Manage Sales
                        <a href="{{ route('sales.create') }}" class="btn btn-success btn-sm float-end">Add New Sale</a>
                    </div>

                    <div class="card-body">
                        <!-- Search Form -->
                        <form method="GET" action="{{ route('sales.index') }}" class="mb-3">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Search sales..."
                                    value="{{ request('search') }}">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </form>

                        <!-- Success and Error Message Pop-ups -->
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @elseif(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <!-- Sales Table -->
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Sale_Id</th>
                                    <th>Service</th>
                                    <th>Branch</th>
                                    <th>Client Name</th>
                                    <th>Client Contact</th>
                                    <th>Status</th>
                                    <th>Quantity</th>
                                    <th>Amount</th>
                                    <th>Recorded By</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sales as $sale)
                                    <tr>
                                        <td>{{ $sale->id }}</td>
                                        <td>{{ $sale->service->title }}</td>
                                        <td>{{ $sale->branch->name }}</td>
                                        <td>{{ $sale->client_name }}</td>
                                        <td>{{ $sale->client_contact }}</td>
                                        <td>
                                            <form action="{{ route('sales.changeStatus', $sale->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <select name="status" class="form-select" onchange="this.form.submit()">
                                                    <option value="pending"
                                                        {{ $sale->status === 'pending' ? 'selected' : '' }}>Pending
                                                    </option>
                                                    <option value="completed"
                                                        {{ $sale->status === 'completed' ? 'selected' : '' }}>Completed
                                                    </option>
                                                    <option value="canceled"
                                                        {{ $sale->status === 'canceled' ? 'selected' : '' }}>Canceled
                                                    </option>
                                                </select>
                                            </form>
                                        </td>
                                        <td>{{ $sale->quantity }}</td>
                                        <td>{{ number_format($sale->amount, 2) }}</td>
                                        <td>{{ $sale->user->name }}</td>
                                        <td>
                                            <a href="{{ route('sales.edit', $sale->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('sales.destroy', $sale->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Pagination Links -->
                        <div class="d-flex justify-content-center mt-3">
                            {{ $sales->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
