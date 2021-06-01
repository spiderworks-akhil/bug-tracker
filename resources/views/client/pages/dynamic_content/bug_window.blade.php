@php $data = explode('#',$obj->message); @endphp
<ul class="trace-list">
    <li >
        <h5>{{$obj->name}}</h5>
        <span class="badge {{$obj->error_code_class()}}" >{{$obj->error_code}}</span>
        <small><i>{{$obj->url}}</i></small>
    </li>
    @foreach($data as $obj)
        <li>{{$obj}}</li>
    @endforeach
</ul>