<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>
<body>


<div class="container-fluid">
    <div class="row">

        <main role="main" class="col-10">
            @section('content')
            @show
        </main>
    </div>
</div>



<script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
@section('bottom')
@show
</body>
</html>