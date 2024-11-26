<!DOCTYPE html>
<html>

<head>
    <title>Sales Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <h1 class="text-center">Sales Report</h1>
    <table class="table table-bordered">
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
</body>

</html>
