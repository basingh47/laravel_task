@php
    use Carbon\Carbon;
@endphp
<!DOCTYPE html>
<html>

<head>
    <title>PDF </title>
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

        h4 {
            margin: 0;
        }

        .w-full {
            width: 100%;
        }

        .w-half {
            width: 0%;
            /* text-align: center; */
        }

        .w-half12 {
            width: 120%;
            text-align: center;
            /* padding-left: 290px; */

        }

        .margin-top {
            margin-top: 1.25rem;
        }

        .footer {
            font-size: 0.875rem;
            padding: 1rem;
            background-color: rgb(241 245 249);
        }

        table {
            width: 100%;
            border-spacing: 0;
        }

        table.products {
            font-size: 0.875rem;
        }

        table.products tr {
            background-color: gray;
        }

        table.products th {
            color: black;
            padding: 0.5rem;
        }

        table tr.items {
            background-color: rgb(241 245 249);
            margin-left: 200px;
            text-align: center;
        }

        table tr.items td {
            padding: 5px;
        }

        .total {
            text-align: right;
            margin-top: 1rem;
            font-size: 0.875rem;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">

        <table class="w-full">
            <tr>
                <td class="w-half">
                    <img src="data:image/svg+xml;base64,<?php echo base64_encode(file_get_contents(base_path('public/assets/images/logo.jpg'))); ?>"
                        width="120">
                </td>
                <td class="w-half12">
                    <h2> Weekely Throwable Report</h2>
                </td>
            </tr>
        </table>
        <div class="margin-top">
            @foreach($userData as $key => $items)
                @dd($userData);
                <table class="products">
                    <tr>
                        <th>Product_name</th>
                        <th>{{$key}}</th>
                        {{-- <th>{{ Carbon::parse($key)->format('l')}}</br>{{$key}}</th> --}}

                    </tr>
                    <tbody>
                        {{-- @foreach ($items as $item)
                        <tr class="items">
                            <td> {{ $item->product_name }} </td>
                            <td> {{ $item->wasteqty }} </td>
                        </tr>
                        @endforeach --}}
                    </tbody>
                </table>
            @endforeach
        </div>
        <div class="footer margin-top">
            <div>EQSR.com</div>
            <div>&copy;18-June-2025</div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>