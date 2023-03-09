@extends('layouts.front')


@section('content')
</div>

<div class="container">
    <div class="row justify-content-center">
        <div>
            <h1>Restaurants</h1>
        </div>
        <div class="col-3">
        {{--    @include('front.common.restaurants')--}}
        </div>
        <div class="col-9">
            <div class="card-body">
                <div class="container">
                    <div class="row justify-content-center">
                        @foreach($dishes as $dish)
                        <div class="col-3 list-table">
                            <h2>{{$dish->title}}</h2>
                            <h5>{{$dish->price}} Eur</h5>
                            <a href="{{route('show-dish', $dish)}}">
                                <div>
                                    @if($dish->photo)
                                    <img class="mainPhoto" src="{{asset($dish->photo)}}">
                                    @else
                                    <img class="img-thumbnail" src="{{asset('nopic/noPhoto.jpg')}}">
                                    @endif
                                </div>
                            </a>
                            <div>
                                <form action="{{route('add-to-cart')}}" method="post">
                                    <button type="submit" class="btn btn-danger mt-1">Buy Now</button>
                                    <input type="number" min="1" value="1" name="count">
                                    <input type="hidden" min="1" name="product" value="{{$dish->id}}">
                                    @csrf
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{--@if($perPageShow != 'all')
{{ $hotels->links() }}
@endif--}}
</div>
@endsection