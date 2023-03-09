@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Edit dish</h1>
                </div>

                <div class="card-body">

                    <form action="{{route('dishes-update', $dish)}}" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label">Dish name</label>
                            <input type="text" class="form-control" name="dish_title" value="{{old('dish_title', $dish->title)}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Price</label>
                            <input type="text" class="form-control" name="dish_price" value="{{old('dish_price', $dish->price)}}">
                        </div>
                    
                        @if($dish->photo)
                        <div class="col-12">
                            <div class="mb-3">
                                <img class="img-responsive" src="{{asset($hotel->picture)}}" width="460" height="345">
                            </div>
                        </div>
                        @endif

                        <div class="mb-3">
                            <label class="form-label">Hotel photo</label>
                            <input type="file" class="form-control" name="photo">
                        </div>
                        <div class="col-9">
                            <div class="mb-3">
                                <label class="form-label">Dish description</label>
                                <textarea class="form-control" name="hotel_desc" rows="8">{{old('dish_description', $dish->description)}}</textarea>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-outline-primary">Update</button>

                            @if($dish->photo)
                            <button type="submit" class="btn btn-outline-danger" name="delete_photo" value="1">Delete photo</button>
                            @endif
                        </div>
                        @method('put')
                        @csrf



                    </form>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection