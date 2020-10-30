<?php
      $dir=str_replace('_', '-', app()->getLocale())=="en"? "ltr":"rtl";
      $align=$dir=='rtl'?'right':'left';
 ?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{$dir}}">

<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">


    <!-- jQuery library -->
    <script src="/js/jquery-3.5.1.js"></script>


    <!-- Popper JS -->
    <script src="/js/popper-base.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="/js/bootstrap.min.js"></script>
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
    {{-- {{ str_replace('_', '-', app()->getLocale()) }} --}}


    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">{{__('CreatePage.Navbar')}}</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            {{-- يعمل لوب ويطلع لك اللغات الي انته مفعلها مع اسمها ورابطها --}}
            <ul class="navbar-nav">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <li>
                <li class="nav-item active">
                    {{-- عند الظغط علئ الرابط حسب اللغه يحول الديفولت عندك فكل الي عملته باي لغه يتفعل --}}
                    <a class="nav-link"
                        href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">{{ $properties['native'] }}<span
                            class="sr-only">(current)</span></a>
                </li>
                @endforeach
            </ul>
        </div>
    </nav>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{__("indexPage.Name")}}</th>
                <th scope="col">{{__("indexPage.Price")}}</th>
                <th scope="col">{{__("indexPage.Details")}}</th>
                <th scope="col">{{__("indexPage.operation")}}</th>
            </tr>
        </thead>
        @foreach ($offers as $offer)
        <tbody>
            <tr>
                <th>{{$offer->id}}</th>
                <td>{{$offer->name}}</td>
                <td>{{$offer->price}}</td>
                <td>{{$offer->details}}</td>
                <td><a href="{{url('Offers/edit/'.$offer->id)}}"><button class="btn btn-success">{{__("indexPage.operation")}}</button></a></td>
            </tr>

        </tbody>
        @endforeach

    </table>


</body>

</html>
