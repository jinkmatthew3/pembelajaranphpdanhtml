<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php 
	echo $css;
	echo $js;
	 ?>
</head>
<body>
	<div class="container">
    <div class="col-md-12">
      <h1 class="col-md-6" style="font-family: 'Gugi';">Add Products</h1>
      <h2 class="col-md-6" style="font-family: 'Gugi';">Fasmawo</h2>
    </div>
    
    <div class="col-md-12">
    <form action="insert_action" method="POST" class="form-horizontal">
      <div class="form-group">
        <label class="control-label col-md-4">ID</label>
        <div class="col-md-6">
          <input type="text" class="form-control" placeholder="ID" name="item_id" required>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-4">Product Name</label>
        <div class="col-md-6">
          <input type="text" class="form-control" placeholder="Product Name" name="name">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-4">Stock</label>
        <div class="col-md-6">
          <input type="text" class="form-control" placeholder="Stock" name="stock" required>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-4">Price</label>
        <div class="col-md-6">
          <input type="text" class="form-control" placeholder="Price" name="price">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-4">Gender</label>
        <div class="col-md-6">
          <input type="text" class="form-control" placeholder="Gender" name="gender">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-4">Category</label>
        <div class="col-md-6">
          <input type="text" class="form-control" placeholder="Category" name="category">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-4">Description</label>
        <div class="col-md-6">
          <input type="text" class="form-control" placeholder="Description" name="description">
        </div>
      </div>
      <!-- <div class="form-group">
        <label class="control-label col-md-4">Image</label>
        <div class="col-md-6">
          <input type="file" class="form-control" placeholder="Image" name="imgp"  accept="image/png, image/jpeg">
        </div>
      </div> -->
      <div class="form-group">
        <div class="col-md-offset-4">
          <button type="submit" name="submit" class="btn btn-info" value="Submit">Submit</button>
          
        </div>
      </div>
    </form>
    <button type="submit" name="cancel" class="btn btn-default" value="Cancel" id="btnCancel">Cancel</button>
    </div>
  </div>

  <?php 
  if(isset($_GET['statsimpan'])) {
    if($_GET['statsimpan']==1) {
      echo "<script>alert('Simpan sukses');</script>";
    } else {
      echo "Simpan Gagal";
    }
  }
  ?>
  <script type="text/javascript">
  	$('#btnCancel').click(function(){
			let move="<?php echo base_url('index.php/home/index') ?>"
			window.location.href=move;
		})
  </script>
</body>
</html>