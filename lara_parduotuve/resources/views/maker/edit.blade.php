@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Maker</div>

                <div class="card-body">
                    <form method="POST" action="{{route('maker.update',[$maker->id])}}">
                        Name: <input type="text" name="maker_name" value="{{old('maker_name',$maker->name)}}">
                        @csrf
                        <button type="submit">EDIT</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
