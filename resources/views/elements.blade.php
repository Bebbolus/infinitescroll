@extends('layouts.main')
@section('content')

    <div class="category" style="display: inline;">
        <div class="list-group text-center">
            <a href="/elements/1" class="list-group-item">
                <small>old-category</small>
            </a>

            <a href="/elements/1" class="list-group-item">
                category
            </a>
        </div>
    </div>

    <div class="col-md-6 col-md-offset-3" style="display: inline;" id="post-data">
        @include('partials.element')
    </div>


    <div class="next-category" style="display: inline;">
        <div class="list-group text-center">
            <a href="/elements/1" class="list-group-item">
                next-category
            </a>

            <a href="/elements/1" class="list-group-item">
                <small> very-next-category</small>
            </a>
        </div>
    </div>


@endsection

@section('page_scripts')
    <script type="text/javascript">
        var firstPage = {{$firstPage}};
        var lastPage = {{$elements->lastPage()}};
        var pageDown = firstPage;
        var pageUp = firstPage;
        $(window).scroll(function() {
            if($(window).scrollTop() + $(window).height() + 150 >= $(document).height()) {
                pageDown++;
                if(pageDown <= lastPage )
                {loadMoreData(pageDown);}
            }
            else if ($(window).scrollTop() <= 150) {
                console.log(firstPage);
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
                    var firstMsg = $('#elements:first');
                    $('.ajax-load').hide();
                    $("#post-data").prepend(data.html);
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