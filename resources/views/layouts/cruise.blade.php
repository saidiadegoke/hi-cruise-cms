<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="author" content="OluseunAra" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />

    <title>HI Impact Cruise - @yield("title")</title>
    <link type="shortcut" rel="icon" href="img/fav.png" />
    <link type="shortcut" rel="icon" href="{{asset('assets/img/fav.png')}}">
    <link type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome/css/fontawesome-all.css')}}" type="text/css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link type="text/css" href="{{asset('assets/css/slider.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('assets/css/main.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('assets/css/responsive.css')}}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/459a83cc19.js"></script>
    @yield("styles")
</head>

<body>

    @yield("content")

    <script type="text/javascript" src="{{asset('assets/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/news-ticker.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/main.js')}}"></script>
    @yield("scripts")
</body>

</html>