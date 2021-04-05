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
                            <li class="list-group-item list-line">
                                <div class="list-line_books">
                                    <div class="list-line_title">
                                        {{$car->name}}
                                    </div>
                                    <div class="list-line_author">
                                        {{$car->carMaker->name}}
                                    </div>
                                </div>
                                <div class="list-line_button">
                                    <a href="{{route('car.edit',[$car])}}">EDIT</a>
                                    <form method="POST" action="{{route('car.destroy', [$car])}}">
                                        @csrf
                                        <button type="submit">DELETE</button>
                                    </form>
                                </div>
                            </li>
                            @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
