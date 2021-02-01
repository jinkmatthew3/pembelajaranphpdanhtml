<div id="all">
  <div id="content">
    <div class="container" style="padding: 15px 0 15px 0">
      <div class="row justify-content-center">
        <div id="details" class="box" style="border: solid 1px #e6e6e6;
        border-radius: .30rem;
        -webkit-box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
        box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
        padding: 30px 30px 30px 30px;">
        <?php foreach ($produk as $barang) : ?>
          <h1 style="text-align: center;">PRODUCT DETAIL</h1>
          <hr style="border-color  : #71BEA3;">
          <div class="row">
            <div class="col-lg-8 col-md-8 product_image">
              <img src="<?php echo base_url(); ?>assets/uploads/poto/<?= $barang['Image'] ?>" width="100%" class="img-fluid">
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="product_name">
                  <h1 class="text-center"><?= $barang['name'] ?></h1>
                </div>
                <h4>Product details</h4>
                <div class="product_description">
                  <p><?= $barang['description'] ?></p>
                </div>
                <div class="product_material">
                  <h4>Material &amp; care</h4>
                  <ul>
                    <li><?= $barang['material'] ?></li>
                  </ul>
                </div>
                <div class="product_size">
                  <h4>Size &amp; Fit</h4>
                  <ul>
                    <?php foreach ($size as $ukuran) : ?>
                      <li><?= $ukuran['size'] ?></li>
                    <?php endforeach ?>
                  </ul>
                </div>
                <div class="product_price">
                  <p class="price"><?= $barang['price'] ?></p>
                </div>
                <p class="text-center buttons">
                  <h3>Quantity</h3>
                  <form action="<?= base_url() ?>cart/insertToCart/<?= $barang['item_id'] ?>" method="POST">
                    <input type="number" min="1" step="1" value="1" class="form-control" style="width:25%" name="qty">
                    <br>
                    <button type="submit" class="btn" style="background-color: #71BEA3; border-color: #71BEA3; color: white">
                      <i class="fas fa-shopping-cart">
                      </i> Add to cart
                    </button>
                  </form>
              </p>
            </div>
          </div>
        </div>
      <?php endforeach ?>
      </div>
    </div>
  </div>
</div>
