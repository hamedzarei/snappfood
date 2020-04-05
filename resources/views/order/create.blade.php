@extends('base.base')

@section('content')
    <div class="container-fluid">
        <form method="post" action="/api/order">
            <div class="form-group">
                <label for="owner_name">Your Name:</label>
                <input name="owner_name" type="text" class="form-control" id="owner_name">
            </div>
            <div class="form-group">
                <label for="restaurant_id">restaurant id:</label>
                <input name="restaurant_id" type="text" class="form-control" id="restaurant_id">
            </div>

            <div class="foods">
                <div class="form-group">
                    <label for="food[0]">food id:</label>
                    <input name="food[0]" type="text" class="form-control" id="food[0]">
                </div>
            </div>
            <input type="button" class="add btn btn-default" value="Add">
            <input type="submit" class="btn btn-default" value="submit">
        </form>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            var lastNumber = 0;
            $('input.add').on('click', function () {
                lastNumber++;
                $('.foods').append('<div class="form-group">' +
                    '<label for="food['+lastNumber+']">food id:</label>' +
                    '<input name="food['+lastNumber+']" type="text" class="form-control" id="food['+lastNumber+']">'+
                    '</div>');
            });
        });
    </script>
@endsection