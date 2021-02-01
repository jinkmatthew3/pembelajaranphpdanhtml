<style>
 #tgh{
  margin: 0;
  position: absolute;
  top: 50%;
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
 }
</style>
<div id="all">
  <div id="content">
    <div class="container" style="padding: 15px 0 15px 0">
        <div class="box" style="border: solid 1px #e6e6e6;
        border-radius: .30rem;
        -webkit-box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
        box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
        padding: 30px 30px 30px 30px;">
        <div class="row justify-content-center">
          <div class="col-lg-3">
            <!-- MENU SIDEBAR DI LEFT -->
            <div class="card sidebar-menu mb-4" style="margin-top: 80px;">
              <div class="card-header">
                <h3 class="h4 card-title" style="text-align: center;">Categories</h3>
              </div>
              <div class="card-body">
                <ul class="nav nav-pills flex-column category-menu">
                  <li><a href="<?= base_url() ?>home/tampilBarang/<?php 
                    if($gender == "man"){
                      echo "woman";
                    }
                    else{
                      echo "man";
                    } ?>/all" class="nav-link"><i class="fas fa-arrow-left"></i><?php 
                    if($gender == "man"){
                      echo "Woman";
                    }
                    else{
                      echo "Man";
                    } ?></a>
                    <!-- <ul class="list-unstyled">-->
                      <li><a href="<?= base_url() ?>home/tampilBarang/<?= $gender ?>/all" class="nav-link">ALL PRODUCTS</a></li>
                      <li><a href="<?= base_url() ?>home/tampilBarang/<?= $gender ?>/shirt" class="nav-link">SHIRT</a></li>
                      <li><a href="<?= base_url() ?>home/tampilBarang/<?= $gender ?>/t-shirt" class="nav-link">T-SHIRT</a></li>
                      <li><a href="<?= base_url() ?>home/tampilBarang/<?= $gender ?>/short" class="nav-link">SHORT</a></li>
                      <li><a href="<?= base_url() ?>home/tampilBarang/<?= $gender ?>/long_pants" class="nav-link">LONGPANTS</a></li>
                      <li><a href="<?= base_url() ?>home/tampilBarang/<?= $gender ?>/shoes" class="nav-link">SHOES</a></li>
                  <!--   </ul>-->
                  </li>
                </ul>
              </div>
            </div>
          </div>
        <!-- *** MENUS AND FILTERS END ***-->
        <!-- TAMPILIN PRODUCT SESUAI KATEGORI YANG DIPILIH-->
          <div class="col-lg-9">
            <div class="box">
              <!-- SETELAH "-" ITU ISINYA SESUAI SAMA KATEGORI YANG DIPILIH DI SIDEBAR-->
              <h1 style="text-align: center;"><?= strtoupper($gender) ?> - </h1>
              <br>
            </div>
            <div class="row products">
              <?php if($barang != NULL){ ?>
                <?php foreach($barang as $barangs) : ?>
                  <div class="col-lg-3 col-md-6 d-flex" style="margin-bottom: 10px">
                      <div class="product card">
                        <div class="card-body">
                          <a href="<?= base_url() ?>home/productDetails/<?= $barangs['item_id'] ?>" class="stretched-link"></a>
                          <img src="<?= base_url() ?>assets/uploads/poto/<?= $barangs['Image'] ?>" alt="" class="img-fluid" style=" height: 200px ; width: 450px">
                          <div>
                          <p style="text-align: center"; vertical-align="middle"><?= $barangs['name'] ?></p>
                          </div>
                        </div>
                        <div class="card-footer" style="padding: 0 0 0 0;">
                          <p class="text-muted" style="text-align: center;">Rp. <?= $barangs['price'] ?></p>
                        </div>
                      </div>
                    <!-- /.product            -->
                  </div>
                <?php endforeach  ?>
              <?php } ?>
            </div>
            <br>
            <div class="box info-bar">
              <div class="row">
                <div class="col-md-12 col-lg-4 products-showing">Showing <strong><?= sizeof($barang) ?></strong> of <strong>25</strong> products</div>
              </div>
            </div>
            <div class="pages">
              <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                <ul class="pagination">
                  <li class="page-item" style="padding-right:10px"><a href="#" aria-label="Previous" class="page-link"><span aria-hidden="true">« Previous</span><span class="sr-only">Previous</span></a></li>
                  <li class="page-item" style="padding-left:10px"><a href="#" aria-label="Next" class="page-link"><span aria-hidden="true">Next »</span><span class="sr-only">Next</span></a></li>
                </ul>
              </nav>
            </div>
          </div>
        <!-- /.col-lg-9-->
      </div>
    </div>
  </div>
</div>

<?php
    //kasih tau kalo signupnya bener
    if(isset($_SESSION['errorDoubleBarang'])){
        echo "<script> alert('Barang sudah ada di shopping cart. Tidak boleh double.'); </script>";
        unset($_SESSION['errorDoubleBarang']);
    }
    //kasih tau kalo loginnya salah
    if(isset($_SESSION['successBarang'])){
        echo "<script> alert('Barang berhasil dimasukkan ke shopping cart'); </script>";
        unset($_SESSION['successBarang']);
    }
?>