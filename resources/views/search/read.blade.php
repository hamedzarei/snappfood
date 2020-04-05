@extends('base.base')

@section('content')

    <div class="container-fluid">
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Tax</th>
                <th>lat</th>
                <th>lon</th>
                {{--<th>action</th>--}}
            </tr>
            </thead>

            <tbody>
            @foreach($result as $row)
                <tr>
                    <td class="id">{{$row['id']}}</td>
                    <td class="name">
                        <input type="text" value="{{$row['name']}}">
                    </td>
                    <td class="tax">
                        <input type="text" value="{{$row['tax']}}">
                    </td>
                    <td class="lat">
                        <input type="text" value="{{$row['lat']}}">
                    </td>
                    <td class="lon">
                        <input type="text" value="{{$row['lon']}}">
                    </td>
                    {{--<td class="action">--}}
                        {{--<button class="btn btn-success update"> update </button>--}}
                        {{--<button class="btn btn-danger remove"> remove </button>--}}
                    {{--</td>--}}
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection