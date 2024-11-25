@extends('layouts.portal')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-mt-5">
                <h1>Record Sales</h1>
                <div class="card">
                    <div class="card-header">Record Sale</div>

                    <div class="card-body">
                        <!-- Success and Error Message Pop-ups -->
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @elseif(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <!-- Sales Record Form -->
                        <form action="{{ route('sales.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="service_id" class="form-label">Service</label>
                                <select name="service_id" id="service_id" class="form-select" required>
                                    <option value="" disabled selected>Select a service</option>
                                    @foreach ($services as $service)
                                        <option value="{{ $service->id }}">{{ $service->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="branch_id" class="form-label">Branch</label>
                                <select name="branch_id" id="branch_id" class="form-select" required>
                                    <option value="" disabled selected>Select a branch</option>
                                    @foreach ($branches as $branch)
                                        <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input type="number" name="quantity" id="quantity" class="form-control" min="1"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label for="amount" class="form-label">Amount</label>
                                <input type="number" name="amount" id="amount" class="form-control" min="1"
                                    required>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Record Sale</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
