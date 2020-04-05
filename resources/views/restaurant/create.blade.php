@extends('base.base')

@section('content')
    <div class="container-fluid">
        <form method="post" action="/api/restaurant">
            <div class="form-group">
                <label for="name">Name:</label>
                <input name="name" type="text" class="form-control" id="name">
            </div>
            <div class="form-group">
                <label for="lat">lat:</label>
                <input name="lat" type="text" class="form-control" id="lat">
            </div>

            <div class="form-group">
                <label for="lon">lon:</label>
                <input name="lon" type="text" class="form-control" id="lon">
            </div>

            <div class="form-group">
                <label for="tax">tax:</label>
                <input name="tax" type="text" class="form-control" id="tax">
            </div>

            <input type="submit" class="btn btn-default" value="submit">
        </form>
    </div>
@endsection
