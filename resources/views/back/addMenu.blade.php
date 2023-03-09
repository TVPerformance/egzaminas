@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Add menu</h1>
                </div>

                <div class="card-body">

                    <form action="{{route('menus-store')}}" method="post" enctype="multipart/form-data">
                        <div class="mb-2">
                            <label class="form-label">Restaurant</label>
                            <select class="form-select" name="rest_id">
                                @foreach($rests as $rest)
                                <option value="{{$rest->id}}">{{$rest->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Menu name</label>
                            <input type="text" class="form-control" placeholder="enter menu name..." name="title">
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