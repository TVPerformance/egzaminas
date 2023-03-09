@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <h1>Add restaurant</h1>
                </div>

                <div class="card-body">

                    <form action="{{route('rests-store')}}" method="post">
                        <div class="mb-3">
                            <label class="form-label">Restaurant title</label>
                            <input type="text" class="form-control" placeholder="enter restaurant's name..." name="title">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Code</label>
                            <input type="text" class="form-control" placeholder="enter restaurant's code..." name="code">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Adress</label>
                            <input type="text" class="form-control" placeholder="enter restaurant's address..." name="address">
                        </div>
                       
                        <div class="mb-3">
                        <button type="submit" class="btn btn-outline-primary">Add</button>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection