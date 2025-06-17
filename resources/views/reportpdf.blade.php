<!DOCTYPE html>
<html>

<head>
    <title>Laravel PDF Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Report</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        body {
            font-family: 'Arial, sans-serif';
        }

        .container {
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .content {
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <nav class="navbar bg-body-tertiary">
                <div class="container">
                    <a class="navbar-brand" href="#">
                        <img src="{{ asset('asset/images/reportpdf.png') }}" alt="Report PDF" width="30" height="24">
                    </a>
                    <h1>Weekly Report (2 Weeks )</h1>
                </div>
            </nav>
        </div>
        <div class="content">
            <table class="table">
                @foreach ($data as $key => $date)
                    <thead>
                        <tr>
                            <th scope="col">Products</th>
                            <th scope="col">{{$key}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($date as $data)
                            <tr>
                                <td>{{$data['product_name']}}</td>
                                <td>{{$data['qty']}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>