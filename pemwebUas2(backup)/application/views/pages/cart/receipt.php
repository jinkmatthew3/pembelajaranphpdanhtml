<style media="screen">
  .row {
  display: flex;
  }

  .column {
  flex: 20%;
  }

  .box{
    border: solid 1px #e6e6e6;
    border-radius: .30rem;
    -webkit-box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
    box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
    padding: 30px 30px 30px 30px;
    margin-left: 180px;
    margin-top: 30px;
    width:65%;
  }
  .cont{
    background-color: #71BEA3;
    border-radius: .30rem;
    border-color: #71BEA3;
    color: white;
    margin-top: 30px;
    margin-left: 180px;
  }
</style>
<div class="row">
  <!-- KIRI -->
  <div class="column" style="background-color: #20948B;color:white;">
    <!-- head ! -->
    <div class="row">
      <div class="col-md-3">
        <i class="far fa-check-circle fa-5x" style="padding-left: 70px;"></i>
      </div>
      <div class="col-md-auto" style="padding-top: 15px">
        <p>
          Order Order-ID : #<?php
          $number = $transaksi[0]['transactions_id'];
          $number = sprintf('%05d',$number);
          print $number;

          ?>
          <br>
          Thank you FName!
        </p>
      </div>
    </div>

    <!-- body -->

    <div class="content">
      <div class="box">
        <h3>Your order is confirmed!</h3>
        <p>
          Thank you for your trust to purchasing in our website!
          Our team will give you a message when we already deliver your order!
          Can't wait for your next order!
          Have a nice day!
        </p>
      </div>
      <div class="box">
        <h3>Customer Information</h3>
        <p>
          <strong>Contact information</strong><br>
          <?= $user_detail[0]['email'] ?>
          <br><br>
          <strong>Shipping address</strong><br>
          <?= $user_detail[0]['fName'] ?> <?= $user_detail[0]['lName'] ?><br>
          <?= $transaksi[0]['shipping_address'] ?><br>
          <?= $user_detail[0]['pNumber'] ?>
          <br><br>
          <strong>Shipping method</strong><br>
          Fashmawo delivery (FREE)
        </p>
      </div>
    </div>
    <button type="button" class="btn cont" onclick="location.href = '<?= base_url() ?>'">Continue Shopping</button>
    <!-- /.KIRI -->
  </div>
  <!-- KANAN -->
  <div class="column">
    <div class="content" style="padding: 10px 20px 10px 20px; margin-right: 10px;">
      <div class="table-responsive" style="border: 1px solid #dee2e6 ;border-radius: .30rem;">
        <table class="table table table-condensed table-borderless" style="border-color: white;">
          <tbody>
            <!-- LOAD BARANG -->
            <!-- <tr>
              <td><a href="#"><img src="<?= base_url()?>/assets/image/G1.jpg" style="width: 75px;height:75px;border-radius: .30rem;"></a></td>
              <td colspan="3">White Blouse Armani</td>
              <td>$246.00</td>
              <td>2</td>
              <td>$492.00</td>
            </tr>
            <tr>
              <td><a href="#"><img src="<?= base_url()?>/assets/image/G1.jpg" style="width: 75px;height:75px;border-radius: .30rem;"></a></td>
              <td colspan="3">Black Blouse Armani</td>
              <td>$200.00</td>
              <td>2</td>
              <td>$400.00</td>
               /.LOAD BARANG
            </tr> -->
            <?php foreach($item as $barang){ ?>
              <tr>
                <td><a href="<?= base_url() ?>home/productDetails/<?= $barang['item_id'] ?>"><img src="<?= base_url()?>/assets/uploads/poto/<?= $barang['Image'] ?>" style="width: 75px;height:75px;border-radius: .30rem;"></a></td>
                <td colspan="3"><?= $barang['name'] ?></td>
                <td><?= $barang['price'] ?></td>
                <td><?= $barang['qty'] ?></td>
                <td><?= $barang['price']*$barang['qty'] ?></td>
              </tr>
            <?php } ?>
          </tbody>
          <tfoot style="background-color: #71BEA3">
            <!-- TOTAL -->
            <tr >
              <td><strong>Sub Total</strong></td>
              <td colspan="5">&nbsp;</td>
              <td>$<?php 
                $total = 0;
                foreach($item as $barang) {
                  $total = $total + $barang['price']*$barang['qty'];
                }
                echo $total;
              ?></td>
            </tr>
            <tr>
              <td><strong>Shipping</strong></td>
              <td colspan="5">&nbsp;</td>
              <td>FREE</td>
            </tr>
            <tr>
              <td><strong>Total</strong></td>
              <td colspan="5">&nbsp;</td>
              <td>$<?php 
                $total = 0;
                foreach($item as $barang) {
                  $total = $total + $barang['price']*$barang['qty'];
                }
                echo $total;
              ?></td>
              <!-- /.TOTAL -->
            </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.table-responsive-->
    </div>
    <!-- /.COLUMN KANAN -->
  </div>
</div>
