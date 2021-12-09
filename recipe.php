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
  <h1>Recipe</h1>
  <hr>
  <div class="row">
    <div class="col-md-12">
      <button class="btn btn-secondary" data-toggle="modal" data-target="#modal-default-add">Create</button>
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-md-12">
        <table id="example" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Product Name</th>
              <th>Serving Size</th>
              <th>Procedure</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
          <tr>
              <th>Product Name</th>
              <th>Serving Size</th>
              <th>Procedure</th>
              <th>Action</th>
          </tr>
          </tfoot>
        </table>
    </div>

  </div>

</div>
<?php include 'modals/editproductmodal.php'?>
<?php include 'modals/addproductmodal.php'?>

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
    "ajax": "dtserver/getavailableproducts.php"
  });
};

function editProduct(id) {
  $.ajax({  
    url:"actions/viewproduct.php",  
    method:"post",  
    data:{id:id},  
    success:function(data){  
      $('#product_modal').html(data);  
      $('#modal-default').modal("show");
    }  
  }); 
}

function deleteproduct(id) {
  if (confirm('Are you sure you want to delete this recipe?')) {
    $.ajax({  
      url:"actions/deleteproduct.php",  
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

function previewFile() {
  var preview = document.querySelector('img');
  var file    = document.querySelector('input[type=file]').files[0];
  var reader  = new FileReader();

  reader.onloadend = function () {
    preview.src = reader.result;
  }

  if (file) {
    reader.readAsDataURL(file);
  } else {
    preview.src = "";
  }
}


</script>

</body>
</html>
