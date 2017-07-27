@extends('layouts.main')
@section('content')

    <div class="gallery text-center"  id="post-data">
        @include('partials.element_gallery')
    </div>


@endsection

@section('page_scripts')
    <script type="text/javascript">


        function isInViewport(element) {
            var rect = element.getBoundingClientRect();
            var html = document.documentElement;

            return (
                rect.top >= bounding &&
                rect.bottom <= (window.innerHeight || html.clientHeight) -bounding
            );
        }

        var firstPage = {{$firstPage}};
        var lastPage = {{$elements->lastPage()}};
        var pageDown = firstPage;
        var pageUp = firstPage;
        var marginLimit = 300;
        var bounding = 250;


        $(window).scroll(function() {

            var zommed = 0;
            $('.elements').each(function(index, domEle){

                if(isInViewport(this) && zommed <= 0)
                {
                    $(this).css('opacity','1');
                    $(this).css('transform','scale(1.6)');
                    $(this).css('margin','110px');
                    zommed++;
                }
                else {
                    $(this).css('transform','scale(0.8)');
                    $(this).css('opacity','0.5');
                    $(this).css('margin','');
                }
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
                    $("#post-data").prepend(data.html);
                    $('html,body').animate({
                            scrollTop: firstMsg.offset().bottom},
                        'slow');
                })
                .fail(function(jqXHR, ajaxOptions, thrownError)
                    {
                        alert('server not responding...');
                    }
                );
        }



    </script>
@endsection