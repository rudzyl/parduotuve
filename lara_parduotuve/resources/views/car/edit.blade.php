@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Car</div>

                <div class="card-body">
                    <form method="POST" action="{{route('car.update',[$car])}}">
                        <div class="form-group">
                            <label>Name:</label>
                            <input type="text" class="form-control" name="car_name" value="{{old('car_name',$car->name)}}">
                            <small class="form-text text-muted">Edit car name</small>
                        </div>

                        <div class="form-group">
                            <label>Plate:</label>
                            <input type="text" class="form-control" name="car_plate" value="{{old('car_plate',$car->plate)}}">
                            <small class="form-text text-muted">Edit car plate</small>
                        </div>
                        <div class="form-group">
                            <label>About:</label>
                            <textarea name="car_about" id="summernote" value="{{$car->about}}">{{$car->about}}</textarea>
                            <small class="form-text text-muted">Edit car's about</small>
                        </div>
                        <div class="form-group">
                            <select name="maker_id">
                                @foreach ($makers as $maker)
                                <option value="{{$maker->id}}" @if($maker->id == $car->maker_id) selected @endif>
                                    {{$maker->name}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        @csrf
                        <button class="btn btn-primary" type="submit">EDIT</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    window.addEventListener('DOMContentLoaded', (event) => {
        $('#summernote').summernote();
    });

</script>
@endsection
