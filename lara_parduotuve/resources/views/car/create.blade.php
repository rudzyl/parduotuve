@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Car</div>
                <div class="card-body">
                    <form method="POST" action="{{route('car.store')}}">
                        <div class="form-group">
                            <label>Name:</label>
                            <input type="text" class="form-control" name="car_name" value="{{old('car_name')}}">
                            <small class="form-text text-muted">Car's name</small>
                        </div>
                        <div class="form-group">
                            <label>Plate:</label>
                            <input type="text" class="form-control" name="car_plate" value="{{old('car_plate')}}">
                            <small class="form-text text-muted">Car's plate</small>
                        </div>
                        <div class="form-group">
                            <label>About:</label>
                            <textarea name="car_about" id="summernote"></textarea>
                            <small class="form-text text-muted">Car's about</small>
                        </div>
                        <div class="form-group">
                            <select name="maker_id">
                                @foreach ($makers as $maker)
                                <option value="{{$maker->id}}">{{$maker->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @csrf
                        <button class="btn btn-success" type="submit">ADD</button>
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
