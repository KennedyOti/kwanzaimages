<!DOCTYPE html>
<html>

<head>
    <title>Sales Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table {
            border-collapse: collapse;
        }

        .table th,
        .table td {
            vertical-align: middle;
            text-align: center;
            border: 1px solid #dee2e6 !important;
            /* Ensure all cells have borders */
        }

        .table thead th {
            background-color: #f8f9fa;
            /* Light gray for the header */
            color: #333;
            font-weight: bold;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
            /* Alternating row color */
        }

        h1 {
            margin-top: 20px;
            margin-bottom: 20px;
            color: #007bff;
        }
    </style>
</head>

<body>
    <div class="container my-5">
        <h1 class="text-center">Sales Report</h1>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Sale_Id</th>
                        <th>Service</th>
                        <th>Branch</th>
                        <th>Quantity</th>
                        <th>Amount</th>
                        <th>Recorded By</th>
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
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
