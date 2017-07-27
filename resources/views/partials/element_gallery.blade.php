@foreach($elements as $element)

    <div class="elements gallery-element" id="elem-{{ $element->id }}">
            <img src="{{ $element->image }}" alt="..." >
    </div>

@endforeach