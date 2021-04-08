@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Maker</div>

                <div class="card-body">
                    <form method="POST" action="{{route('maker.store')}}">
                        Name: <input type="text" name="maker_name" value="{{old('maker_name')}}">
                        @csrf
                        <button class="btn btn-success" type="submit">ADD</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
