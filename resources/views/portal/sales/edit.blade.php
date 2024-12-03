@extends('layouts.portal')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Sale</div>

                    <div class="card-body">
                        <!-- Success Message -->
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form action="{{ route('sales.update', $sale->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="service_id" class="form-label">Service</label>
                                <select name="service_id" id="service_id" class="form-select" required>
                                    @foreach ($services as $service)
                                        <option value="{{ $service->id }}"
                                            {{ $sale->service_id == $service->id ? 'selected' : '' }}>{{ $service->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="branch_id" class="form-label">Branch</label>
                                <select name="branch_id" id="branch_id" class="form-select" required>
                                    @foreach ($branches as $branch)
                                        <option value="{{ $branch->id }}"
                                            {{ $sale->branch_id == $branch->id ? 'selected' : '' }}>{{ $branch->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="client_name" class="form-label">Client Name</label>
                                <input type="text" name="client_name" id="client_name" class="form-control"
                                    value="{{ $sale->client_name }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="client_contact" class="form-label">Client Contact</label>
                                <input type="text" name="client_contact" id="client_contact" class="form-control"
                                    value="{{ $sale->client_contact }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" id="status" class="form-select" required>
                                    <option value="pending" {{ $sale->status === 'pending' ? 'selected' : '' }}>Pending
                                    </option>
                                    <option value="completed" {{ $sale->status === 'completed' ? 'selected' : '' }}>
                                        Completed</option>
                                    <option value="canceled" {{ $sale->status === 'canceled' ? 'selected' : '' }}>Canceled
                                    </option>
                                </select>
                            </div>


                            <div class="mb-3">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input type="number" name="quantity" id="quantity" class="form-control"
                                    value="{{ $sale->quantity }}" min="1" required>
                            </div>

                            <div class="mb-3">
                                <label for="amount" class="form-label">Amount</label>
                                <input type="number" name="amount" id="amount" class="form-control"
                                    value="{{ $sale->amount }}" min="1" required>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Update Sale</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
