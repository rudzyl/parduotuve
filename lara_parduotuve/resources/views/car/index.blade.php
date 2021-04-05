@foreach ($cars as $car)
<a href="{{route('car.edit',[$car])}}">{{$car->name}} {{$car->carMaker->name}}</a>
<form method="POST" action="{{route('car.destroy', [$car])}}">
    @csrf
    <button type="submit">DELETE</button>
</form>
<br>
@endforeach
