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

                    <form action="{{ route('dishes-createSecondary') }}" method="post" enctype="multipart/form-data">
                        <div class="mb-2">
                            <label class="form-label">Restaurant</label>
                            <select class="form-select" name="rest_id">
                                @foreach($rests as $rest)
                                <option value="{{$rest->id}}">{{$rest->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection