@extends('layouts.main')
@section('content')



    <div id="carousel">
        <img src="http://magal.li/i/130/130" alt="Image 1" />
        <img src="http://magal.li/i/130/130" alt="Image 2" />
        <img src="http://magal.li/i/130/130" alt="Image 3" />
        <img src="http://magal.li/i/130/130" alt="Image 4" />
        <img src="http://magal.li/i/130/130" alt="Image 5" />
    </div>





@endsection

@section('page_scripts')
    <script type="text/javascript" src="/js/jquery.waterwheelCarousel.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#carousel").waterwheelCarousel({
                // include options like this:
                // (use quotes only for string values, and no trailing comma after last option)
                orientation: "vertical",
                separation: 100,
                preloadImages:"false"
            });
        });
    </script>
@endsection