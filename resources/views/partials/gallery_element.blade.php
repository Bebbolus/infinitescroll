@foreach($elements as $element)


    <img src="{{ $element->image }}" alt="Image {{$element->name}}" id="{{ $element->id }}"/>

@endforeach