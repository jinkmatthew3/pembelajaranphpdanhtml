<link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/style.default.css') ; ?>">
<div id="all">
  <div id="content">
    <div class="container" style="padding-top: 40px">
      <div class="row">
        <div id="basket" class="col-lg-9">
          <div class="box">
            <form method="post" action="checkout_action">
              <h1>Shopping Cart</h1>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th colspan="2">Product</th>
                      <th>Quantity</th>
                      <th>Unit Price</th>
                      <th colspan="2">Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><a href="#"><img src="assets/image/test.jpg" alt="Maison Kitsune Sweetshirt" width="100px"></a></td>
                      <td><a href="#">Maison Kitsune Sweetshirt</a></td>
                      <td>
                        <input type="number" value="2" class="form-control">
                      </td>
                      <td>$123.00</td>
                      <td>$246.00</td>
                      <td><a href="#"><i class="fa fa-trash-o"></i></a></td>
                    </tr>
                    <tr>
                      <td><a href="#"><img src="assets/image/test.jpg" alt="Maison Kitsune Crew Sweat"  width="100px"></a></td>
                      <td><a href="#">Maison Kitsune Crew Sweat</a></td>
                      <td>
                        <input type="number" value="1" class="form-control">
                      </td>
                      <td>$200.00</td>
                      <td>$200.00</td>
                      <td><a href="#"><i class="fa fa-trash-o"></i></a></td>
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th colspan="5">Total</th>
                      <th colspan="2">$446.00</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.table-responsive-->
              <div class="box-footer d-flex justify-content-between flex-column flex-lg-row">
                <div class="left"><a href="category.html" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i> Continue shopping</a></div>
                <div class="right">
                  <button class="btn btn-outline-secondary"><i class="fa fa-refresh"></i> Update cart</button>
                  <button type="submit" class="btn btn-primary">Proceed to checkout <i class="fa fa-chevron-right"></i></button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <!-- /.col-lg-9-->
        <div class="col-lg-3">
          <div id="order-summary" class="box">
            <div class="box-header">
              <h3 class="mb-0">Order Summary</h3>
            </div>
            <div class="table-responsive">
              <table class="table">
                <tbody>
                  <tr>
                    <td>Order subtotal</td>
                    <th>$446.00</th>
                  </tr>
                  <tr>
                    <td>Shipping and handling</td>
                    <th>$10.00</th>
                  </tr>
                  <tr>
                    <td>Tax</td>
                    <th>$0.00</th>
                  </tr>
                  <tr class="total">
                    <td>Total</td>
                    <th>$456.00</th>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- /.col-md-3-->
      </div>
    </div>
  </div>
</div>
