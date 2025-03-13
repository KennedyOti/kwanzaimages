@extends('layouts.portal')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-10">
            <div class="text-center mb-4">
                <h2 class="fw-bold">Record Sales</h2>
                <p class="text-muted">Fill in the details below to record a sale.</p>
            </div>

            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center fw-semibold">
                    Record Sale
                </div>

                <div class="card-body p-4">
                    <!-- Sales Record Form -->
                    <form action="{{ route('sales.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="service_id" class="form-label fw-semibold">Service</label>
                            <select name="service_id" id="service_id" class="form-select" required>
                                <option value="" disabled selected>Select a service</option>
                                @foreach ($services as $service)
                                <option value="{{ $service->id }}">{{ $service->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="branch_id" class="form-label fw-semibold">Branch</label>
                            <select name="branch_id" id="branch_id" class="form-select" required>
                                <option value="" disabled selected>Select a branch</option>
                                @foreach ($branches as $branch)
                                <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Client Information -->
                        <div class="mb-3">
                            <label for="client_name" class="form-label fw-semibold">Client Name</label>
                            <input type="text" name="client_name" id="client_name" class="form-control"
                                placeholder="Enter client's name" required>
                        </div>

                        <div class="mb-3">
                            <label for="client_contact" class="form-label fw-semibold">Client Contact</label>
                            <input type="text" name="client_contact" id="client_contact" class="form-control"
                                placeholder="Enter client's contact (e.g., phone or email)" required>
                        </div>
                        <!-- End of Client Information -->

                        <div class="mb-3">
                            <label for="quantity" class="form-label fw-semibold">Quantity</label>
                            <input type="number" name="quantity" id="quantity" class="form-control" min="1"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="amount" class="form-label fw-semibold">Amount</label>
                            <input type="number" name="amount" id="amount" class="form-control" min="1"
                                required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Record Sale</button>
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