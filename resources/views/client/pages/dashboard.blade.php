@extends('client.base')

@section('content')
    <div class="container-fluid">
        <div class="row">

            <table class="table table-striped">
                <thead>
                <th>id</th>
                <th>url</th>
                <th>name</th>
                <th>error code</th>
                {{--<th>message</th>--}}
                </thead>
                <tbody>
                    @foreach($bugs as $obj)

                        <tr>
                            <td>{{$obj->id}}</td>
                            <td>{{$obj->url}}</td>
                            <td>{{$obj->name}}</td>
                            <td>{{$obj->error_code}}</td>
                            {{--<td>{{$obj->message}}</td>--}}
                        </tr>
                    @endforeach
                </tbody>
            </table>



        </div>
    </div>
@endsection