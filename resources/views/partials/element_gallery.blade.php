@foreach($elements as $element)

    <div class="col-sm-12 text-center elements gallery-element">

        <a href="/gallery/{{ $element->id }}">
            <img class="media-objec" src="{{ $element->image }}" alt="...">
        </a>

    </div>

@endforeach