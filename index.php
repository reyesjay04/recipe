<!DOCTYPE html>
<html lang="en">
<head>
  <title>Recipe Management System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  

  <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'nav.php'?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="jumbotron">
        <h1 class="jumbotrontext">Find Recipe</h1>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><span class="fa fa-search form-control-feedback"></span></span>
          </div>
          <input id="tosearch" type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1">
          <div class="col-auto">
            <div class="form-check mb-2">
              <input class="form-check-input" type="checkbox" id="autoSizingCheck">
              <label class="form-check-label" for="autoSizingCheck" style="color: white;">
                Search by Date
              </label>
            </div>
          </div>
          <div class="input-group-append">
            <button class="btn btn-secondary" id="2" onclick="getproducts(this.id)" type="button">Search</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="row" id="displayproducts">

      </div>
    </div>
  </div>
</div>

<?php include 'modals/modal.php'?>



<script type="text/javascript">       

$(document).ready(function() {
  getproducts(1);
});
  

function viewRecipe(id) {
  $.ajax({  
    url:"viewrecipe.php",  
    method:"post",  
    data:{id:id},  
    success:function(data){  
      $('#product_modal').html(data);  
      $('#modal-default').modal("show");
    }  
  });  
}

function getproducts(id) {
  var pn = $("#tosearch").val();
  var byDate;

  if($("#autoSizingCheck").prop('checked') == true){
    byDate = "ON";
  } else {
    byDate = "OFF";
  }

  $.ajax({
    url: 'getproducts.php',
    type: 'post',
    data:{id:id, pn:pn, byDate:byDate},
    dataType: 'json',
    success:function(response){  
     var len = response.length;
     $("#displayproducts").empty();
     for( var i = 0; i<len; i++){
        var image = response[i]['image'];
        var title = response[i]['title'];      
        var procedure = response[i]['procedure'];
        var productid = response[i]['productid'];    

         $("#displayproducts").append("<div class='col-md-3'><div class='card' ><img class='card-img-top' src='data:image/png;base64,"+image+"' data-holder-rendered='true' style='height: 142px;width: 253px;'><div class='card-body' style='height: 202px;width: 253px;'><h5 style='height: 48px' class='card-title'>"+title+"</h5><p class='card-text' style='height: 48px'>"+procedure+"</p><button onclick='viewRecipe(this.id)' id='"+productid+"' class='btn btn-primary'>View Recipe</button></div></div></div> ");
     }
    }
  })
}

</script>


</body>
</html>
