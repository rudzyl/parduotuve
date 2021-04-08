@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">Cars List</div>
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
                                    <form method="POST" action="{{route('car.destroy', [$car])}}">
                                        @csrf
                                        <button class="btn btn-danger" type="submit">DELETE</button>
                                    </form>
                                </div>
                            </li>
                            @endforeach
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
