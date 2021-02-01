<style>
  /* Make the image fully responsive */
  .carousel-inner img {
      width: 100%;
      height: 100%;
  }
  </style>
<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <!-- img('assets/image/G1.jpg','width="1100"','height="500"') -->
      <img src="<?= base_url()?>/assets/image/G1.jpg" alt="Los Angeles" width="1100" height="500">
    </div>
    <div class="carousel-item">
       <!-- img('assets/image/G2.jpg','width="1100"','height="500"') -->
      <img src="<?= base_url()?>/assets/image/G2.jpg" alt="Los Angeles" width="1100" height="500">
      <!-- <img src="ProjectUAS/G2.jpg" alt="Chicago" width="1100" height="500"> -->
    </div>
    <div class="carousel-item">
      <img src="<?= base_url()?>/assets/image/G3.jpg" alt="Los Angeles" width="1100" height="500">
      <!-- img('assets/image/G3.jpg','width="1100"','height="500"') -->
      <!--<img src="ProjectUAS/G3.jpg" alt="New York" width="1100" height="500">-->
    </div>
  </div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
<div class="container-fluid" style="background-color: #71BEA3">

  <div class="row text-center" style="margin-bottom:15px">
    <div class="col-sm-4">
      <img src="<?= base_url(); ?>/assets/image/G1.jpg" width="100px" height="100px" style="margin:15px;"><br>
      ALL PRODUCTS
    </div>
    <div class="col-sm-4">
    <img src="<?= base_url(); ?>/assets/image/G1.jpg" width="100px" height="100px" style="margin:15px;"><br>
      MAN
    </div>
    <div class="col-sm-4">
      <img src="<?= base_url(); ?>/assets/image/G1.jpg" width="100px" height="100px" style="margin:15px;"><br>
      WOMAN
    </div>
  </div>
  <div class="jumbotron text-center" style="background-color: white;">
    PRODUCTS
    <div class="row text-center">
        <?php foreach ($randBarang as $row) : ?>
      <div class="col-sm-3">
        <img src="<?php  
        if($row['Image']!=NULL){
            echo base_url().$row['image'];
        }
        else{
            echo base_url()."/assets/image/G1.jpg";
        } ?>" width="200px" height="200px" style="margin:15px;"><br>
        <?= $row['name']; ?>
      </div>
      <?php endforeach ?>
    </div>
  </div>
</div>
<?php echo getcwd()?>