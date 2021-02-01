<div id="all">
  <div id="content" style="padding: 30px 0 30px 0">
    <div class="container box" style="border: solid 1px #e6e6e6;
    border-radius: .30rem;
    -webkit-box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
    box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
    padding: 30px 30px 30px 30px;">
      <div class="row">
        <div class="col-lg-12 box">
          <div id="basket">
            <h1 style="text-align: center">Shopping Cart</h1>
            <br>
            <form method="POST" action="<?= base_url() ?>cart/something/">
              <div class="table-responsive">
                <table class="table">
                  <thead style="background-color: #71BEA3; color: white">
                    <tr>
                      <th colspan="2">Product</th>
                      <th>Quantity</th>
                      <!-- <th>Size</th> -->
                      <th>Unit Price</th>
                      <th colspan="2">Total</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- <tr>
                      <td><a href="#"><img src="assets/image/test.jpg" alt="Maison Kitsune Sweetshirt" width="100px"></a></td>
                      <td><a href="#">Maison Kitsune Sweetshirt</a></td>
                      <td>
                        <input type="number" min="1" step="1" class="form-control">
                      </td>
                      <td> L </td>
                      <td>$123.00</td>
                      <td>$246.00</td>
                      <td><a href="#"><i class="far fa-trash-alt" style="color: #71BEA3"></i></a></td>
                    </tr>
                    <tr>
                      <td><a href="#"><img src="assets/image/test.jpg" alt="Maison Kitsune Crew Sweat"  width="100px"></a></td>
                      <td><a href="#">Maison Kitsune Crew Sweat</a></td>
                      <td>
                        <input type="number" min="1" step="1" class="form-control">
                      </td>
                      <td> S </td>
                      <td>$200.00</td>
                      <td>$200.00</td>
                      <td><a href="#"><i class="far fa-trash-alt" style="color: #71BEA3"></i></a></td>
                    </tr> -->
                    <?php foreach($cart as $barang) { ?>
                      <tr>
                        <td><a href="<?= base_url() ?>home/productDetails/<?= $barang['item_id'] ?>"><img src="<?= base_url() ?>assets/uploads/poto/<?= $barang['Image'] ?>" alt="Maison Kitsune Sweetshirt" width="100px"></a></td>
                        <td><a href="<?= base_url() ?>home/productDetails/<?= $barang['item_id'] ?>"><?= $barang['name'] ?></a></td>
                        <td>
                          <input type="number" min="1" name="qty<?= $barang['item_id']?>" step="1" class="form-control asd" value ="<?= $barang['qty'] ?>">
                        </td>
                        <td>$<?= $barang['price'] ?> </td>
                        <td>$<?= $barang['price']*$barang['qty'] ?></td>
                        <td><a href="<?= base_url() ?>cart/deleteFromCart/<?= $barang['item_id'] ?>"><i class="far fa-trash-alt" style="color: #71BEA3"></i></a></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive-->
              <hr style="border-color: #71BEA3;">
              <!-- ORDER SUMMARY-->
              <br>
              <div id="order-summary" class="box">
                <div class="box-header">
                  <h3 class="mb-0">Order Summary</h3>
                </div>
                <div class="table-responsive">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td>Cart Sub Total</td>
                        <th>$<?php 
                          $total = 0;
                          foreach($cart as $barang) {
                            $total = $total + $barang['price']*$barang['qty'];
                          }
                          echo $total;
                        ?></th>
                      </tr>
                      <tr>
                        <td>Shipping Cost</td>
                        <th>Free</th>
                      </tr>
                      <tr class="total">
                        <td>Total</td>
                        <th>$<?php 
                          $total = 0;
                          foreach($cart as $barang) {
                            $total = $total + $barang['price']*$barang['qty'];
                          }
                          echo $total;
                        ?></th>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <p style="text-decoration: underline; font-style: italic;"><strong>Note : </strong>Please Update cart after change the Quantity to see the new total price.</p>
              <br>
              <div class="box-footer d-flex justify-content-between flex-column flex-lg-row">
                <div class="left"><a href="<?= base_url() ?>home/tampilBarang/" target="_blank" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i> Continue shopping</a></div>
                <div class="right">
                  <button class="btn" type="submit" style="background-color: #49beb7; border-color: #49beb7; color: white"><i class="fas fa-sync-alt"></i> Update cart</button>
                  <button class="btn" type="button" style="background-color: #71BEA3; border-color: #71BEA3; color: white" onclick="location.href = '<?= base_url() ?>cart/checkOut/'">Proceed to checkout <i class="fa fa-chevron-right"></i></button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <!-- /.col-lg-12-->
      </div>
    </div>
  </div>
</div>
<?php
    //kasih tau kalo signupnya bener
    if(isset($_SESSION['deleteSuccess'])){
        echo "<script> alert('Barang berhasil dihapus'); </script>";
        unset($_SESSION['deleteSuccess']);
    }
?>