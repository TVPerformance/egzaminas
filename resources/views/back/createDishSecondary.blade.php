@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Add dish</h1>
                </div>

                <div class="card-body">

                    <form action="{{route('dishes-store')}}" method="post" enctype="multipart/form-data">
                        <div class="mb-2">
                            <label class="form-label">Menu</label>
                            <select class="form-select" name="menu_id">
                                @foreach($menus as $menu)
                                <option value="{{$menu->id}}">{{$menu->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Dish title</label>
                            <input type="text" class="form-control" placeholder="enter dish name..." name="dish_title">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Price</label>
                            <input type="text" class="form-control" placeholder="enter price..." name="price">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Dish photo</label>
                            <input type="file" class="form-control" name="photo">
                        </div>
                        <div class="col-9">
                            <div class="mb-3">
                                <label class="form-label">Dish description</label>
                                <textarea class="form-control" name="dish_description"  rows="8">{{old('dish_description')}}</textarea>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-outline-primary">Add New</button>
                        </div>
                        @csrf



                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection