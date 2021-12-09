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
  

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">

  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>



</head>
<body>

<?php include 'nav.php'?>

<div class="container">
  <hr>
  <h1>Ingredients</h1>
  <hr>
  <div class="row">
    <div class="col-md-12">
        <table id="example" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Product Name</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
          <tr>
              <th>Product Name</th>
              <th>Action</th>
          </tr>
          </tfoot>
        </table>
    </div>

  </div>

</div>

<?php include 'modals/viewingredientsmodal.php'?>
<?php include 'modals/addingredientmodal.php'?>

<script type="text/javascript">
  $(document).ready(function() {
    LoadDatatable();
 });

function LoadDatatable() {
  var table = $('#example').DataTable({
    "responsive": true,
    "autoWidth": false,
    "processing": true,
    "serverSide": true,
    "ajax": "dtserver/getavailableingredients.php",
    "columnDefs": [{},{ "width": "10%", "targets": 1 }]
  });
};

function viewingredients(id) {
  $.ajax({  
    url:"actions/viewingredients.php",  
    method:"post",  
    data:{id:id},  
    success:function(data){  
      $('#product_modal').html(data);  
      $('#modal-default').modal("show");
    }  
  }); 
}

function addingredient(id) {
  $.ajax({  
    url:"actions/addingredient.php",  
    method:"post",  
    data:{id:id},  
    success:function(data){  
      $('#product_modal-add').html(data);  
      $('#modal-default-add').modal("show");
    }  
  }); 
}

</script>

</body>
</html>
