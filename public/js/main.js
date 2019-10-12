//Record Your Today's Meal
//launch Count
let launchCount = 0;
let dinnerCount = 0;


$('#launchINC').click(function () {
    if(launchCount>=0){
        launchCount++;

    }
    saveMealCount('launch');
});
$('#launchDEC').click(function () {
    if(launchCount<=0){
        launchCount = 0;
    }else{
        launchCount--;

    }
    saveMealCount('launch');
});

//dinnerCount
$('#dinnerINC').click(function () {
    if(dinnerCount>=0){
        dinnerCount++;
       saveMealCount('dinner');

    }
});
$('#dinnerDEC').click(function () {
    if(dinnerCount<=0){
        dinnerCount = 0;
    }else{
        dinnerCount--;
    }
    saveMealCount('dinner');
});

// Store in to database
function saveMealCount(status) {

     let link = '';
     let count = 0;
     if (status == 'launch'){
        link = "/savelaunchCount/"+id;
         count = launchCount;
      }else{
           link = "/savedinnerCount/"+id;
           count = dinnerCount;
       }
    console.log(link);

    let request = $.ajax({

        url:  link,
        type: "GET",
        data: {'mealCount' : count},
        success:function (response) {
            console.log(response);
            $('#launchMeal').html(response.launch);
            $('#dinnerMeal').html(response.dinner);
        }

    });
    request.done(function (msg) {

    });
    request.fail(function(jqXHR, textStatus) {
        alert( "Request failed: " + textStatus );
    });

}




