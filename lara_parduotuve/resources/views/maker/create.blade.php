<form method="POST" action="{{route('maker.store')}}">
    Name: <input type="text" name="maker_name" value="{{old('maker_name')}}">
    @csrf
    <button type="submit">ADD</button>
</form>
