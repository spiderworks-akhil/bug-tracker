@extends('client.base')

@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="first-window">
                <ul class="bugs-list">
                    @foreach($bugs as $obj)
                        <li class="bug-row" data-id="{{encrypt($obj->id)}}">
                            <h5>{{$obj->name}}</h5>
                            <span class="badge {{$obj->error_code_class()}}" >{{$obj->error_code}}</span>
                            <small><i>{{$obj->url}}</i></small>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="second-window" id="bug-window">
            </div>

        </div>
    </div>
@endsection

@section('bottom')

    <script>
        $(document).ready(function () {

            $('.bug-row').on('click', function () {
                let dom = $(this);
                let id  = $(this).data('id');
                $.get('{{route('get.bug')}}',{id:id}).done(function (data) {
                    $('#bug-window').html(data.html);
                    $('.bugs-list li').removeClass("active");
                    dom.addClass("active");
                })
            });

        });
    </script>

@endsection