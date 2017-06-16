@foreach($elements as $element)
    <div class="media elements">
        <input id="cat" type="hidden" name="cat" value="{{strtoupper($element->category()->first()->name)}}" >
        <input id="catId" type="hidden" name="catId" value="{{$element->category()->first()->id}}" >
        <input id="name" type="hidden" name="name" value="{{strtoupper($element->name) }}" >
        @if($element->category()->first()->next())
        <input id="catNext" type="hidden" name="catNext" value="{{strtoupper($element->category()->first()->next()->name)}}" >
        <input id="nextCatId" type="hidden" name="nextCatId" value="{{$element->category()->first()->next()->id}}" >
        @endif
        @if($element->category()->first()->next())
            <input id="catFuture" type="hidden" name="catNext" value="{{strtoupper($element->category()->first()->next()->next()->name)}}" >
            <input id="futureCatId" type="hidden" name="futureCatId" value="{{$element->category()->first()->next()->next()->id}}" >
        @endif
        @if($element->category()->first()->prev())
        <input id="catPrev" type="hidden" name="catPrec" value="{{strtoupper($element->category()->first()->prev()->name)}}" >
        <input id="oldCatId" type="hidden" name="oldCatId" value="{{$element->category()->first()->prev()->id}}" >
        @endif
        <div class="media-body">
            <h1> {{$element->category()->first()->name}}</h1>
            <h4 class="media-heading">{{ $element->name }}</h4>
            {!! $element->description !!}
        </div>
        <div class="media-right">
            <a href="#">
                <img class="media-objec" src="{{ $element->thumbnail }}" alt="...">
            </a>
        </div>
    </div>

@endforeach