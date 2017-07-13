@extends('layouts.main')
@section('content')

    <div class="col-md-6 col-md-offset-3" style="display: inline;" id="post-data">
        @include('partials.element_gallery')
    </div>


@endsection

@section('page_scripts')
    <script type="text/javascript">


        function isInViewport(element) {
            var rect = element.getBoundingClientRect();
            var html = document.documentElement;
            return (
                rect.top >= 0 &&
                rect.left >= 0 &&
                rect.bottom <= (window.innerHeight || html.clientHeight) &&
                rect.right <= (window.innerWidth || html.clientWidth)
            );
        }

        function addTransition(element) {
            //altezza pagina
            var h = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);

            element = $(element);
            //prende l'altezza dell'elemnto
            var elementHeight =element .height();
            //prende la distanza dal TOP
            var topdist = element.offset().top;

            var center = h/2;

            var centerdistance = center - (topdist + (elementHeight/2));

            if(centerdistance <  center+100) {
                //console.log( "distanza dal centro = " + centerdistance);
                $(this).removeClass("zoom-out");
                element.addClass("zoom");
            }


        }

        var firstPage = {{$firstPage}};
        var lastPage = {{$elements->lastPage()}};
        var pageDown = firstPage;
        var pageUp = firstPage;
        var marginLimit = 0;


        $(window).scroll(function() {

            $('.gallery-element').each(function(index, domEle){
                $(this).removeClass("zoom");
                $(this).addClass("zoom-out");
                if(isInViewport(this)) addTransition(this);
            });

            if($(window).scrollTop() + $(window).height() + marginLimit >= $(document).height()) {
                //SCROLL DOWN!
                pageDown++;
                if(pageDown <= lastPage )
                {loadMoreData(pageDown);}
            }
            else if ($(window).scrollTop() <= marginLimit) {
                //SCROLL UP!
                if (firstPage > 1){
                    if(pageUp < firstPage){
                        if(pageUp -1 > 0 ){
                            pageUp --;
                            loadPrevData(pageUp);
                        }
                    }else{
                        pageUp = firstPage - 1;
                        loadPrevData(pageUp);
                    }

                }
            }
        });

        function loadMoreData(page){
            $.ajax(
                {
                    url: '?page=' + page,
                    type: "get",
                    async: false,
                    beforeSend: function()
                    {
                        $('.ajax-load').show();
                    }
                })
                .done(function(data)
                {
                    if(data.html == " "){
                        $('.ajax-load').html("No more records found");
                        return;
                    }
                    $('.ajax-load').hide();
                    $("#post-data").append(data.html);
                })
                .fail(function(jqXHR, ajaxOptions, thrownError)
                {
                    alert('server not responding...');
                }
            );
        }
        function loadPrevData(page){
            $.ajax(
                {
                    url: '?page=' + page,
                    type: "get",
                    async: false,
                    beforeSend: function()
                    {
                        $('.ajax-load').show();
                    }
                })
                .done(function(data)
                {
                    if(data.html == " "){
                        $('.ajax-load').html("No more records found");
                        return;
                    }
                    // Store eference to first message
                    var firstMsg = $('.elements:first');
                    $('.ajax-load').hide();
                    firstMsg.prepend(data.html);
                    $(document).scrollTop(firstMsg.offset().top);
                })
                .fail(function(jqXHR, ajaxOptions, thrownError)
                    {
                        alert('server not responding...');
                    }
                );
        }


    </script>
@endsection