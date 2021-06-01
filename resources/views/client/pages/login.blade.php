@extends('client.login')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-4 offset-md-4 white blur">
                <h1 style="font-weight: lighter;border-bottom: 0.5px solid #ffc107;padding-bottom: 10px">Bug Tracker <small>v1</small></h1>
                <h4 style="font-weight: lighter">Login</h4>

                <form action="{{url('login')}}" method="post">
                    @csrf

                    @include('client.component.errors')

                    <label for="">Email address</label>
                    <input type="text" class="form-control" name="email" >

                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password">

                    <button type="submit" class="btn btn-warning mt-3">Login</button>
                </form>
            </div>

        </div>
    </div>
@endsection