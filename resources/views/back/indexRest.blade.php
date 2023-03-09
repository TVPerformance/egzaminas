@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <h1>List of restaurants</h1>
                </div>

                <div class="card-body">

                    <ul class="list-group">
                        @foreach($rests as $rest)
                        <div>{{$rest->title}}</div>
                        <div>{{$rest->code}}</div>
                        <div>{{$rest->address}}</div>
                        <a href="{{route('rests-edit', $rest)}}" class="btn btn-primary me-2">Edit</a>

                        <form action="{{route('rests-destroy', $rest)}}" method="post">
                        <button type="submit" class="btn btn-danger">Delete</button>

                        @csrf
                        @method('delete')
                        </form>
                        
                    </ul>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>
</div>
@endsection