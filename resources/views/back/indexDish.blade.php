@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>Hotel list</h1>
                </div>

                <div class="card-body">
                    <ul class="list-group">

                        @foreach($dishes as $dish)
                       

                        <li class="list-group-item">
                            <div class="container">
                                <div class="row">
                                    <div class="col-2 hotel">
                                        {{$dish->title}}
                                    </div>
                                    <div class="col-2 price">{{$dish->price}} Eur</div>

                                    @if($dish->photo)
                                    <div class="col-1">
                                        <img class="img-thumbnail" src="{{asset($dish->photo)}}" width="45" height="34">
                                    </div>
                                    @else
                                    <div class="col-1">
                                        <img class="img-thumbnail" src="{{asset('hotel/absent.jpg')}}" width="45" height="34">
                                    </div>
                                    @endif
                                    
                                            <div class="col-4 d-flex justify-content-end capital" style="display: flex">
                                                <a href="{{route('dishes-show', $dish)}}" class="btn btn-outline-info me-2">Show</a>
                                                <a href="{{route('dishes-edit', $dish)}}" class="btn btn-outline-secondary me-2">Edit</a>

                                                <form action="{{route('dishes-destroy', $dish)}}" method="post">
                                                    <button type="submit" class="btn btn-danger capital">Delete</button>
                                            </div>
                                     
                                    @csrf
                                    @method('delete')
                                    </form>

                        </li>


                        @endforeach
                       


                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
</div>
@endsection