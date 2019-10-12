@extends('master')
@section('title','LOGIN')
@section('content')
    <div class="container">
        <center><h2>Registration</h2></center>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form action="{{url('/register')}}" method="get">
                    {{@csrf_field()}}
                    <div class="form-group">
                        <label for="email">Name:</label>
                        <input type="text" class="form-control" id="email" placeholder="Enter Name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
                <center> <small><a href="{{url('/')}}">Registered? Go to login</a></small></center>
               @if($errors->any())
                    <ul class="list-group">
                        @foreach($errors->all() as $error)
                            <li href="#" class="list-group-item list-group-item-action list-group-item-danger">{{$error}}</li>
                        @endforeach

                    </ul>
                @endif
            </div>
            <div class="col-md-3"></div>

        </div>
    </div>
@stop