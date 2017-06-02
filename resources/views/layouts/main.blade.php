<!DOCTYPE html>
<html lang="en">
<head>
<title>{{config('app.name','ADHOC')}}</title>
@include('layouts.includes.metatags_icons')
@include('layouts.includes.stylesheets')
    <style type="text/css">
        body{
            background: -webkit-linear-gradient(90deg, #16222A 10%, #3A6073 90%); /* Chrome 10+, Saf5.1+ */
            background:    -moz-linear-gradient(90deg, #16222A 10%, #3A6073 90%); /* FF3.6+ */
            background:     -ms-linear-gradient(90deg, #16222A 10%, #3A6073 90%); /* IE10 */
            background:      -o-linear-gradient(90deg, #16222A 10%, #3A6073 90%); /* Opera 11.10+ */
            background:         linear-gradient(90deg, #16222A 10%, #3A6073 90%); /* W3C */
            font-family: verdana;
            color: whitesmoke;
        }
        .ajax-load{
            background: #e1e1e1;
            padding: 10px 0px;
            width: 100%;
        }


         .next-category {
             margin: 0;
             position: fixed;
             bottom: 0;
             right: 0;
             width: 100%;
             height: 83px;
             z-index: 100;
             color: #ffffff;
             background-color: #ff9000;
         }

        .category {
            margin: 0;
            position: fixed;
            top: 0;
            right: 0;
            width: 100%;
            height: 83px;
            z-index: 1;
            color: #ffffff;
            background-color: #ff9000;
        }


    </style>
</head>
<body>
<div class="container" style="margin-top: 120px; margin-bottom: 120px">
            @include('layouts.includes.errors')
            @yield('content')
</div>
<div class="ajax-load text-center" style="display:none">
    <p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif">Loading More post</p>
</div>
@include('layouts.includes.javascripts')
@yield('page_scripts')
</body>
</html>