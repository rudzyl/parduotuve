@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">
                    <h2>Cars List</h2>
                    <div class="make-inline">
                        {{-- su class make inline sutvarkom graziai --}}
                        <form action="{{route('car.index')}}" method="get" class="make-inline">
                            <div class="form-group make-inline">
                                <label> Maker: </label>
                                <select class="form-control" name="maker_id">
                                    <option value="0" disabled @if($filterBy==0) selected @endif>Select Maker</option>
                                    @foreach ($makers as $maker)
                                    <option value="{{$maker->id}}" @if($filterBy==$maker->id) selected @endif>
                                        {{$maker->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-info">FILTER</button>
                        </form>

                        <a href="{{route('car.index')}}" class="btn btn-primary"> Clear filter</a>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <div class="card-body">
                            @foreach ($cars as $car)
                            {{-- list-line kad graziai lygiuotu --}}
                            <li class="list-group-item list-line">
                                {{-- Antraste --}}
                                <div class="list-line_car">
                                    {{-- pavadinimas --}}
                                    <div class="list-line_title">
                                        {{$car->name}}
                                    </div>
                                    <div class="list-line_author">
                                        {{$car->carMaker->name}}
                                    </div>
                                </div>
                                {{-- sulygiuojam mygtukus _button --}}
                                <div class="list-line_button">
                                    <a href="{{route('car.edit',[$car])}}" class="btn btn-primary">EDIT</a>
                                    <form method="POST" class="car-delete" action="{{route('car.destroy', [$car])}}">
                                        @csrf
                                        <button class="btn btn-danger" type="submit">DELETE</button>
                                    </form>
                                </div>
                            </li>
                            @endforeach
                        </div>
                    </ul>
                    <div class="paginate-col">
                        {{$cars->onEachSide(2)->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
