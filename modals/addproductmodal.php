<div class="modal fade" id="modal-default-add">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title">Add Recipe</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="actions/addproduct.php" enctype="multipart/form-data">
        <div class="modal-body" id="product_modal_add">
          <label for="basic-url">Product Name</label>
          <div class="input-group mb-3">
            <input type="text" class="form-control" aria-describedby="basic-addon1" name="prname" value="" required>
          </div>
          <label for="basic-url">Serving Size</label>
          <div class="input-group mb-3">
            <input type="text" class="form-control" aria-describedby="basic-addon1" name="serving" value="" required>
          </div>
          <label for="basic-url">Procedure</label>
          <div class="input-group mb-3">
            <input type="text" class="form-control" aria-describedby="basic-addon1" name="procedure" value="" required>
          </div>
          <input type="file" name="pi" accept="image/*" onchange="previewFile()" required>
          <br>
          <img src="" height="100" alt="Image preview...">
          <input type="hidden" name="b64img" value="'.$product_image.'">
        </div>
        <div class="modal-footer justify-content-between">
          <button type="submit" class="btn btn-primary">Save changes</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>

