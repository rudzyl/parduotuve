<form method="POST" action="{{route('car.store')}}">
    Name: <input type="text" name="car_name" value="{{old('car_name')}}">
    Plate: <input type="text" name="car_plate" value="{{old('car_plate')}}">
    About: <textarea name="car_about" value="{{old('car_about')}}"></textarea>
    <select name="maker_id">
        @foreach ($makers as $maker)
        <option value="{{$maker->id}}">{{$maker->name}}</option>
        @endforeach
    </select>
    @csrf
    <button type="submit">ADD</button>
</form>
