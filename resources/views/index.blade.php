@extends('master')
@section('title','Meal Management')
@section('content')
<!-- The Modal -->

<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Join Meal System By Key</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="/">
                    <div class="form-group">
                        <label for="email">Enroll Key</label>
                        <input type="email" class="form-control" id="email">
                    </div>

            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Join</button>
            </div>
            </form>

        </div>
    </div>
</div>


<section id="monthAnalysis">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="jumbotron">
                    <h5>Total Bazar</h5>
                    <h1>{{$totalExpense}} Taka</h1>
                </div>
            </div>
            <div class="col-md-4">
                <div class="jumbotron">
                    <h5>Your Bazar</h5>
                    <h1>{{$usertotalExpense}} Taka</h1>
                </div>
            </div>
            <div class="col-md-4">
                <div class="jumbotron">
                    <h5>You Will Get</h5>
                    <h1>{{round($givenAmount-($totalMeal*$mealrate),2)}} Taka</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="recordMeal">
    <div class="container">
        <center><h1>Record Your Today's Meal</h1><hr></center>
        <form action="" method="post" style="width:100%;">
        <div class="row">

                <div class="col-md-6 text-center">
                    <button type="button" class="btn btn-lg btn-outline-primary" id="launchDEC">-</button>
                    <button type="button" class="btn btn-lg btn-outline-primary" id="launchINC">+</button>
                    Total Count For Today's Launch: <span id="launchMeal">{{empty($meals) ? 0 : $meals->launch}} </span>
                </div>
                <div class="col-md-6 text-center">
                    <button type="button" class="btn btn-lg btn-outline-primary" id="dinnerDEC">-</button>
                    <button type="button" class="btn btn-lg btn-outline-primary" id="dinnerINC">+</button>
                    Total Count For Today's Dinner: <span id="dinnerMeal">{{empty($meals) ? 0 : $meals->dinner}} </span>
                </div>

        </div><hr>
        </form>
    </div>
</section>

<section id="seeDetails">
    <div class="container">
        <center><h1>Check Months History</h1></center>
        <ul class="list-group">
            <li class="list-group-item"><b>Month:</b> {{\Carbon\Carbon::now()->format('M, Y')}} </li>
            <li class="list-group-item"><b>Total Meal:</b> {{$mealscountofmonth}} </li>
            <li class="list-group-item"><b>Total Bazar:</b> {{$totalExpense}}</li>
            <li class="list-group-item"><b>Meal Rate: </b>{{$mealrate}}</li>
            <li class="list-group-item"><b>Your Total Meal:</b> {{$totalMeal}}</li>
            <li class="list-group-item"><b>Payable Amount:</b> {{$totalMeal*$mealrate}}</li>
        </ul> <hr>
    </div>
</section>

<section>
    <div class="container">
        <center><h1>Add Bazar</h1></center>
        <form class="form-inline justify-content-center" action="{{url('/addBazar/'.$meal_system_id)}}" method="get">
            {{csrf_field()}}
            <label for="email" class="mr-sm-2">Add Bajar:</label>
            <input type="text" class="form-control mb-2 mr-sm-2" name="detail">
            <label for="pwd" class="mr-sm-2">Amount:</label>
            <input type="text" class="form-control mb-2 mr-sm-2" name="cost">
            <button type="submit" class="btn btn-primary mb-2">Submit</button>
        </form>
    </div>
</section>
<script>
    let id ='{{$meal_system_id}}';
</script>
@stop



