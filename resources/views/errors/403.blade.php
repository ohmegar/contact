@section('title')
| 403
@endsection

@include('frontend.head')
@include('frontend.topuser')


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>403 Error Page</title>
</head>
<body>
    <div class="container mt-5 pt-5">
        <div class="alert alert-danger text-center">
            <h2 class="display-3">403</h2>
            <p class="display-5">Sorry , Forbidden</p>
        </div>
    </div>
</body>


@include('frontend.footer')
