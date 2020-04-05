@extends('base.base')

@section('content')
    <div class="container-fluid">
        <form method="post" action="/api/food">
            <div class="form-group">
                <label for="name">Name:</label>
                <input name="name" type="text" class="form-control" id="name">
            </div>
            <div class="form-group">
                <label for="cost">cost:</label>
                <input name="cost" type="text" class="form-control" id="cost">
            </div>

            <div class="form-group">
                <label for="restaurant">restaurant:</label>
                <input name="restaurant" type="text" class="form-control" id="restaurant">
            </div>

            <input type="submit" class="btn btn-default" value="submit">
        </form>
    </div>
@endsection