@foreach($elements as $element)
    <div class="media" id="elements">
        <div class="media-body">
            <h4 class="media-heading">{{ $element->name }}</h4>
            {!! $element->description !!}
        </div>
        <div class="media-right">
            <a href="#">
                <img class="media-object img-circle" src="{{ $element->thumbnail }}" alt="...">
            </a>
        </div>
    </div>


@endforeach