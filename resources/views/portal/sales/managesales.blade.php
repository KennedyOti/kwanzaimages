@extends('layouts.portal')

@section('content')
<div class="container-fluid"> <!-- Use container-fluid for full width -->
    <div class="row justify-content-center">
        <div class="col-12 mt-5">
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
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @elseif(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <!-- Sales Table with DataTables -->
                    <table id="salesTable" class="table table-bordered table-striped display responsive nowrap" style="width:100%">
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
                                <th>Date Recorded</th>
                                <th>Actions</th>
                            </tr>
                            <!-- Add search fields for each column -->
                            <tr>
                                <th><input type="text" class="form-control filter-input" placeholder="Search ID" data-column="0"></th>
                                <th><input type="text" class="form-control filter-input" placeholder="Search Service" data-column="1"></th>
                                <th><input type="text" class="form-control filter-input" placeholder="Search Branch" data-column="2"></th>
                                <th><input type="text" class="form-control filter-input" placeholder="Search Client Name" data-column="3"></th>
                                <th><input type="text" class="form-control filter-input" placeholder="Search Client Contact" data-column="4"></th>
                                <th><input type="text" class="form-control filter-input" placeholder="Search Status" data-column="5"></th>
                                <th><input type="text" class="form-control filter-input" placeholder="Search Quantity" data-column="6"></th>
                                <th><input type="text" class="form-control filter-input" placeholder="Search Amount" data-column="7"></th>
                                <th><input type="text" class="form-control filter-input" placeholder="Search Recorded By" data-column="8"></th>
                                <th><input type="text" class="form-control filter-input" placeholder="Search Date" data-column="9"></th>
                                <th></th> <!-- No search for Actions column -->
                            </tr>
                        </thead>
                        <tbody>
                            <!-- DataTables will populate this -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include DataTables CSS and JS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        // Initialize DataTable
        var table = $('#salesTable').DataTable({
            processing: true,
            serverSide: true,
            responsive: true, // Enable responsive design
            ajax: "{{ route('sales.data') }}", // Route to fetch data
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'service.title',
                    name: 'service.title'
                },
                {
                    data: 'branch.name',
                    name: 'branch.name'
                },
                {
                    data: 'client_name',
                    name: 'client_name'
                },
                {
                    data: 'client_contact',
                    name: 'client_contact'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'quantity',
                    name: 'quantity'
                },
                {
                    data: 'amount',
                    name: 'amount'
                },
                {
                    data: 'user.name',
                    name: 'user.name'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'actions',
                    name: 'actions',
                    orderable: false,
                    searchable: false
                }
            ]
        });

        // Add column-specific search
        $('.filter-input').on('keyup change', function() {
            var column = $(this).data('column'); // Get column index
            table.column(column).search(this.value).draw(); // Apply search
        });

        // AJAX to update sale status
        $(document).on('change', '.status-select', function() {
            var saleId = $(this).data('id');
            var status = $(this).val();
            var url = "{{ route('sales.changeStatus', ':id') }}".replace(':id', saleId);

            $.ajax({
                url: url,
                type: 'PUT',
                data: {
                    _token: "{{ csrf_token() }}",
                    status: status
                },
                success: function(response) {
                    alert('Status updated successfully!');
                },
                error: function(xhr) {
                    alert('Error updating status.');
                }
            });
        });
    });
</script>

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