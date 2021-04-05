@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">Makers List</div>
                <div class="card-body">
                    <ul class="list-group">
                        <div class="card-body">
                            @foreach ($makers as $maker)
                            <li class="list-group-item list-line">
                                <div class="list-line_books">
                                    <div class="list-line_title">
                                        {{$maker->name}}
                                    </div>
                                    <div class="list-line_button">
                                        <a href="{{route('maker.edit',[$maker])}}">EDIT</a>
                                        <form method="POST" action="{{route('maker.destroy', [$maker])}}">
                                            @csrf
                                            <button type="submit">DELETE</button>
                                        </form>
                                    </div>
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
