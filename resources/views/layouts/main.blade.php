<!DOCTYPE html>
<html lang="en">
<head>
<title>{{config('app.name','ADHOC')}}</title>
{{--@include('layouts.includes.metatags_icons')--}}
@include('layouts.includes.stylesheets')
    <style type="text/css">
        .container{
            margin-top: 70px;
            margin-bottom: 70px
        }
         .next-category {
             display: inline;
             margin: 0;
             position: fixed;
             bottom: 0;
             right: 0;
             width: 100%;
             height: 63px;
             z-index: 100;
             color: #ffffff;
         }

        .category {
            display: inline;
            margin: 0;
            position: fixed;
            top: 0;
            right: 0;
            width: 100%;
            height: 63px;
            z-index: 1;
            color: #ffffff;
        }
        .media {
            margin-top: 5px;
        }
        .list-group-item{
            padding-top: 5px;
            padding-bottom: 5px;
            color:gray;
        }

        .zoom-out {
            zoom: 0;
        }

        .zoom {
            zoom: 0.5;
        }

        .gallery-element{
            padding: 20px;
            transition: all .2s ease-in-out;
        }

        .gallery{
            margin-top:300px;
        }

    </style>
</head>
<body>
<div class="container" >
            @include('layouts.includes.errors')
            @yield('content')
</div>

@include('layouts.includes.javascripts')
@yield('page_scripts')
</body>
</html>