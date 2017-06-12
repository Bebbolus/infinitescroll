@foreach($elements as $element)

    <div class="media elements">
        <input id="cat" type="hidden" name="cat" value="{{$element->category()->first()->name}}" >
        <input id="catFirstElementId" type="hidden" name="catFirstElementId" value="{{$element->category()->first()->elements()->first()->id}}" >
        <input id="name" type="hidden" name="name" value="{{$element->name }}" >
        <input id="elementId" type="hidden" name="elementId" value="{{$element->id }}" >
        @if($element->category()->first()->next())
        <input id="catNext" type="hidden" name="catNext" value="{{$element->category()->first()->next()->name}}" >
        @endif
        @if($element->category()->first()->next())
            <input id="catFuture" type="hidden" name="catNext" value="{{$element->category()->first()->next()->next()->name}}" >
        @endif
        @if($element->category()->first()->prev())
        <input id="catPrev" type="hidden" name="catPrec" value="{{$element->category()->first()->prev()->name}}" >
        @endif
        <div class="media-body">
            <h1> {{$element->category()->first()->name}}</h1>
            <h4 class="media-heading">{{ $element->name }}</h4>
            {!! $element->description !!}
        </div>
        <div class="media-right">
            <a href="#">
                <img class="media-object img-circle" src="{{ $element->thumbnail }}" alt="...">
            </a>
        </div>
    </div>
    <hr>
@endforeach