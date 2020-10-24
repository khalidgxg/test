<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>

    <h1 style="text-align:center"> Test Form insert To DB </h1>

    <form class="container " action=" {{Route('create')}}" method="POST">
        @csrf
        <div class="form-group w-50 ">
            <label for="name">Name:</label>
            <input type="text" class="form-control" placeholder="Enter name" id="name" name="name">
            {{-- //validation --}}
            @error('name')
            <small class="form-text text-danger">{{$message}}</small>
            @enderror
        </div>

        <div class="form-group w-50">
            <label for="price">price:</label>
            <input type="text" class="form-control" placeholder="Enter price" id="price" name="price">
            {{-- //validation --}}
            @error('price')
            {{-- //message without (s) is attrbute in @error --}}
            <small class="form-text text-danger">{{$message}}</small>
            @enderror
        </div>

        <div class=" w-50 form-group >
            <label for=" details">details:</label>
            <input type="text" class="form-control" placeholder="Enter details" id="details" name="details">
            {{-- //validation --}}
            @error('details')
            <small class="form-text text-danger">{{$message}}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary text-align-center">Submit</button>

    </form>
    {{-- <h3> {{ $mess ?? '' }} </h3> هنا معناه اختياري --}}

    <div class="alert alert-success w-25 text-center container" role="alert">
      <h4 class="alert-heading">{{$mess ?? ''}} </h4>
        <p></p>
        <p class="mb-0"></p>
    </div>




</body>

</html>