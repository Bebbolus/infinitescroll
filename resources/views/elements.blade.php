@extends('layouts.main')
@section('content')

    <div id="upperCatLinks" class="category" style="display: inline;">
        <div class="list-group text-center">

            @if($elements->first()->category()->first()->prev())
                <a  href="/elements/{{$elements->first()->category()->first()->prev()->id}}" class="list-group-item">
                    <small id="oldCategoryLink">{{strtoupper($elements->first()->category()->first()->prev()->name)}}</small>
                </a>
            @else
                <a  href="/elements/1" class="list-group-item" style="display: none;">
                    <small id="oldCategoryLink"> </small>
                </a>
            @endif
            @if($elements->first()->category()->first())
                <a   href="/elements/{{$elements->first()->category()->first()->id}}" class="list-group-item">
                    <strong id="categoryLink"> {{strtoupper($elements->first()->category()->first()->name)}}</strong>
                </a>
            @endif



        </div>
    </div>

    <div class="col-md-6 col-md-offset-3" style="display: inline;" id="post-data">
        @include('partials.element')
    </div>



    <div id="bottomCatLinks" class="next-category" style="display: inline;">
        <div  class="list-group text-center">
            @if($elements->first()->category()->first()->next())
            <a id="nextCategoryLink" href="/elements/{{$elements->first()->category()->first()->next()->id}}" class="list-group-item">
                {{strtoupper($elements->first()->category()->first()->next()->name)}}
            </a>
            @endif
            @if($elements->first()->category()->first()->next()->next())
            <span   class="list-group-item" style="color:gray">
               <small id="futureCategoryLink">{{strtoupper($elements->first()->category()->first()->next()->next()->name)}}</small>
            </span>
            @endif
        </div>
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

        function changeCategory(element) {
            var old = $('#oldCategoryLink').text($(element).find('#catPrev').val());
            $("#oldCategoryLink").parent().attr("href", "/elements/"+$(element).find('#oldCatId').val());

            var act = $('#categoryLink').text($(element).find('#cat').val());
            $("#categoryLink").parent().attr("href", "/elements/"+$(element).find('#catId').val());

            if(old.text() === act.text() || old.text() == ' ') old.parent().hide();
            else old.parent().show();


            var next = $('#nextCategoryLink').text($(element).find('#catNext').val());
            $("#nextCategoryLink").attr("href", "/elements/"+$(element).find('#nextCatId').val());
            var future = $('#futureCategoryLink').text($(element).find('#catFuture').val());

            if(next.text() === future.text()) future.parent().hide();
            else future.parent().show();
        }

        var firstPage = {{$firstPage}};
        var lastPage = {{$elements->lastPage()}};
        var pageDown = firstPage;
        var pageUp = firstPage;
        var marginLimit = 0;


        $(window).scroll(function() {

            $('.elements').each(function(index, domEle){
                if(isInViewport(this)) changeCategory(this);
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