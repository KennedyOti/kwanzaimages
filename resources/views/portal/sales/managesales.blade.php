@extends('layouts.portal')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

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
