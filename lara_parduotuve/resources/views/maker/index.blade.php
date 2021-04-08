@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">
                    <h2>Makers List</h2>
                    <a href="{{route('maker.index', ['sort' => 'name'])}}" class="btn btn-primary"> Sort by name</a>
                    <a href="{{route('maker.index')}}" class="btn btn-primary"> Default</a>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <div class="card-body">
                            @foreach ($makers as $maker)
                            {{-- list-line kad graziai lygiuotu --}}
                            <li class="list-group-item list-line">
                                {{-- Antraste --}}
                                <div class="list-line_car">
                                    {{-- pavadinimas --}}
                                    <div class="list-line_title">
                                        {{$maker->name}}
                                    </div>
                                </div>
                                {{-- sulygiuojam mygtukus _button --}}
                                <div class="list-line_button">
                                    <a href="{{route('maker.edit',[$maker])}}" class="btn btn-primary">EDIT</a>
                                    <form method="POST" action="{{route('maker.destroy', [$maker])}}">
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
