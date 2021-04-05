<form method="POST" action="{{route('car.update',[$car])}}">
    Name: <input type="text" name="car_name" value="{{old('car_name',$car->name)}}">
    Plate: <input type="text" name="car_plate" value="{{old('car_plate',$car->plate)}}">
    About: <textarea name="car_about" value="{{old('car_about',$car->about)}}">{{$car->about}}</textarea>
    <select name="maker_id">
        @foreach ($makers as $maker)
        <option value="{{$maker->id}}" @if($maker->id == $car->maker_id) selected @endif>
            {{$maker->name}}
        </option>
        @endforeach
    </select>
    @csrf
    <button type="submit">EDIT</button>
</form>
