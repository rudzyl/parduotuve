@foreach ($makers as $maker)
<a href="{{route('maker.edit',[$maker])}}">{{$maker->name}}</a>
<form method="POST" action="{{route('maker.destroy', [$maker])}}">
    @csrf
    <button type="submit">DELETE</button>
</form>
<br>
@endforeach
