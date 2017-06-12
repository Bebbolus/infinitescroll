<!DOCTYPE html>
<html lang="en">
<head>
<title>{{config('app.name','ADHOC')}}</title>
@include('layouts.includes.metatags_icons')
@include('layouts.includes.stylesheets')
    <style type="text/css">
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