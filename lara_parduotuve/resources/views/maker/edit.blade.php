<form method="POST" action="{{route('maker.update',[$maker->id])}}">
    Name: <input type="text" name="maker_name" value="{{old('maker_name',$maker->name)}}">
    @csrf
    <button type="submit">EDIT</button>
</form>
