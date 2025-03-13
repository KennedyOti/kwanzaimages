@extends('layouts.portal')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="text-center mb-4">
                <h2 class="fw-bold text-primary">✏️ Edit Sale Record</h2>
                <p class="text-muted">Update the details below and save changes.</p>
            </div>

            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white text-center fw-semibold fs-5 rounded-top">
                    <i class="fas fa-edit"></i> Edit Sale
                </div>

                <div class="card-body p-5">
                    <!-- Edit Sales Form -->
                    <form action="{{ route('sales.update', $sale->id) }}" method="POST" id="editSaleForm">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="service_id" class="form-label fw-semibold">Service</label>
                                <select name="service_id" id="service_id" class="form-select" required>
                                    @foreach ($services as $service)
                                    <option value="{{ $service->id }}" {{ $sale->service_id == $service->id ? 'selected' : '' }}>
                                        {{ $service->title }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="branch_id" class="form-label fw-semibold">Branch</label>
                                <select name="branch_id" id="branch_id" class="form-select" required>
                                    @foreach ($branches as $branch)
                                    <option value="{{ $branch->id }}" {{ $sale->branch_id == $branch->id ? 'selected' : '' }}>
                                        {{ $branch->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Client Information -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="client_name" class="form-label fw-semibold">Client Name</label>
                                <input type="text" name="client_name" id="client_name" class="form-control"
                                    value="{{ $sale->client_name }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="client_contact" class="form-label fw-semibold">Client Contact</label>
                                <input type="text" name="client_contact" id="client_contact" class="form-control"
                                    value="{{ $sale->client_contact }}" required>
                            </div>
                        </div>
                        <!-- End of Client Information -->

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="status" class="form-label fw-semibold">Status</label>
                                <select name="status" id="status" class="form-select" required>
                                    <option value="pending" {{ $sale->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="completed" {{ $sale->status === 'completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="canceled" {{ $sale->status === 'canceled' ? 'selected' : '' }}>Canceled</option>
                                </select>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="quantity" class="form-label fw-semibold">Quantity</label>
                                <input type="number" name="quantity" id="quantity" class="form-control"
                                    value="{{ $sale->quantity }}" min="1" required>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="amount" class="form-label fw-semibold">Amount (Ksh)</label>
                                <input type="number" name="amount" id="amount" class="form-control"
                                    value="{{ $sale->amount }}" min="1" required>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('sales.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left"></i> Cancel
                            </a>
                            <button type="submit" class="btn btn-lg btn-primary shadow-sm">
                                <i class="fas fa-save"></i> Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SweetAlert2 for Notifications -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: "{{ session('success') }}",
        showConfirmButton: false,
        timer: 3000
    });
</script>
@endif

@if(session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: "{{ session('error') }}",
        showConfirmButton: false,
        timer: 3000
    });
</script>
@endif
@endsection