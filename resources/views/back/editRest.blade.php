@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Edit restaurant</h1>
                </div>
                <div class="card-body">

                    <form action="{{route('rests-update', $rest)}}" method="post">
                        <div class="mb-3">
                            <label class="form-label">Restaurant title</label>
                            <input type="text" class="form-control" name="rest_title" value="{{old('rest_title', $rest->title)}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Restaurant code</label>
                            <input type="text" class="form-control" name="rest_code" value="{{old('rest_code', $rest->code)}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Restaurant address</label>
                            <input type="text" class="form-control" name="rest_address" value="{{old('rest_address', $rest->address)}}">
                        </div>
                      
                        <div class="mb-3">
                        <button type="submit" class="btn btn-outline-primary">Update</button>
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