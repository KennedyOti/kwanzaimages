@extends('layouts.portal')

@section('content')
    <div class="container">
        <h1 class="text-center text-primary mb-4">Record Sales</h1>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Sales Form -->
        <div class="card mb-4" style="opacity: 0.9;">
            <div class="card-header bg-primary text-white">Record a Sale</div>
            <div class="card-body">
                <form action="{{ route('sales.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="service_id" class="form-label">Service</label>
                        <select name="service_id" id="service_id" class="form-select" required>
                            <option value="" selected disabled>Select a service</option>
                            @foreach ($services as $service)
                                <option value="{{ $service->id }}">{{ $service->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="branch_id" class="form-label">Branch</label>
                        <select name="branch_id" id="branch_id" class="form-select" required>
                            <option value="" selected disabled>Select a branch</option>
                            @foreach ($branches as $branch)
                                <option value="{{ $branch->id }}">{{ $branch->name }} - {{ $branch->location }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" name="quantity" id="quantity" class="form-control" min="1" required>
                    </div>
                    <div class="mb-3">
                        <label for="amount" class="form-label">Amount (KSH)</label>
                        <input type="number" name="amount" id="amount" class="form-control" step="0.01"
                            min="1" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Record Sale</button>
                </form>
            </div>
        </div>

        <!-- Sales List -->
        <div class="card">
            <div class="card-header bg-primary text-white">Sales Records</div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Service</th>
                            <th>Branch</th>
                            <th>Quantity</th>
                            <th>Amount (KSH)</th>
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
                                    <form action="{{ route('sales.destroy', $sale->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
