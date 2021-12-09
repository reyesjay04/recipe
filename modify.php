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
<?php include 'functions.php'?>
<div class="container">
  <hr>
  <h1>Modify Ingredients(<?php echo getProductName($_GET['id'])?>)</h1>
  <hr>
  <div class="row">
    <div class="col-md-12">
        <table id="example" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Ingredient Name</th>
              <th>Action</th>
              <th>Ingredient ID</th>
            </tr>
          </thead>
          <tfoot>
          <tr>
              <th>Ingredient Name</th>
              <th>Action</th>
              <th>Ingredient ID</th>
          </tr>
          </tfoot>
        </table>
    </div>

  </div>
<?php include 'modals/editingredientmodal.php'?>
</div>


<script type="text/javascript">
  $(document).ready(function() {
    LoadDatatable();
 });

function LoadDatatable() {
  var id = "<?php echo $_GET['id']?>";
  var table = $('#example').DataTable({
    "responsive": true,
    "autoWidth": false,
    "processing": true,
    "serverSide": true,
    "order": [[2, "asc"]],
    "ajax": "dtserver/getallingredients.php?id="+id,
    "columnDefs": [{},{ "width": "10%", "targets": 1 },{ "visible": false,  "targets": [ 2 ] }]
  });
};

function deleteingredient(id) {
  if (confirm('Are you sure you want to delete this ingredient?')) {
    $.ajax({  
      url:"actions/deleteingredient.php",  
      method:"post",  
      data:{id:id},  
      success:function(data){  
        var table = $('#example').DataTable();
        $('#example').empty();
        table.destroy();
        LoadDatatable();
      }  
    }); 
  }
}

function edit(id) {
  var prid = "<?php echo $_GET['id']?>";
  $.ajax({  
    url:"actions/editingredients.php",  
    method:"post",  
    data:{id:id, prid:prid},  
    success:function(data){  
      $('#product_modal_edit').html(data);  
      $('#modal-default-edit').modal("show");
    }  
  }); 
}



</script>

</body>
</html>
