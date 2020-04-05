@extends('base.base')

@section('content')
    <?php
//            dd($result[0]['restaurant']);
            ?>
    <div class="container-fluid">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>cost</th>
                    <th>restaurant id</th>
                    <th>restaurant name</th>
                    <th>action</th>
                </tr>
            </thead>

            <tbody>
            @foreach($result as $row)
                <tr>
                    <td class="id">{{$row['id']}}</td>
                    <td class="name">
                        <input type="text" value="{{$row['name']}}">
                    </td>
                    <td class="cost">
                        <input type="text" value="{{$row['cost']}}">
                    </td>
                    <td class="restaurant_id">
                        <input type="text" value="{{$row['restaurant_id']}}">
                    </td>

                    <td class="restaurant_name">
                        <a href="/restaurant/read/{{$row['restaurant_id']}}">{{$row['restaurant']['name']}}</a>
                    </td>

                    <td class="action">
                        <button class="btn btn-success update"> update </button>
                        <button class="btn btn-danger remove"> remove </button>
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('js')
    <script>
        $(jQuery).ready(function ($) {
            $('body').on('click', 'button.update', function () {
                console.log($(this).parent().parent().find('.id').text());
                var id = $(this).parent().parent().find('.id').text();
                var columns = $(this).parent().parent();
                $.ajax({
                    url: '/api/food/'+id,
                    method: 'PUT',
                    data: {
                        'name': columns.find('.name > input').val(),
                        'cost': columns.find('.cost > input').val(),
                        'restaurant': columns.find('.restaurant_id > input').val()
                    }
                })
                    .done(function (msg) {
                        alert('updated');
                    })
                    .fail(function () {
                        alert('something wrong');
                    })
            });

            $('body').on('click', 'button.remove', function () {
                console.log($(this).parent().parent().find('.id').text());
                $this = $(this).parent().parent();
                var id = $(this).parent().parent().find('.id').text();
                var columns = $(this).parent().parent();
                $.ajax({
                    url: '/api/food/'+id,
                    method: 'DELETE'
                })
                    .done(function (msg) {
                        $this.hide();
                        alert('removed!');
                    })
                    .fail(function () {
                        alert('something wrong');
                    })
            });

        });
    </script>
@endsection
