@extends('master')
@section('title','Menu')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="input-group mb-3 collapse" id="openmealsystem">
                <input type="text" class="form-control" placeholder="Enter Meal System Name">
                <div class="input-group-prepend">
                    <button class="btn btn-outline-primary" type="button">Create</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
    @foreach($mealSystems as $mealSystem)
        <div class="col-md-3">
            <a href={{url('/MealSystems/'.$mealSystem->id)}}>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{$mealSystem->name}}</h4>
                    <p class="card-text">Admin - {{$mealSystem->admin}}</p>
                </div>
            </div>
            </a>
        </div>
    @endforeach

    </div>
</div>
@stop