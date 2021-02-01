<div class="container">
    <div class="col-md-12"> 
        <div class="col-md-9">
            <h3 style="margin-top: 0px"><b>Manage Product</b> Northwind Traders</h3>
        </div>
        <div class="col-md-3" style="padding-left: 135px;">
            <a href="<?=site_url()?>/insert" >
            <button >Add New</button>
            </a>
        </div>
    </div>
</div>
<div class="container">
    <table id="myTable" class="table table-stripped table-bordered display">
        <thead>
            <th>Id Produk</th>
            <th>Nama</th>
            <th>Quantity per unit</th>
            <th>Harga</th>
        </thead>
        <tbody>
            <?php
                foreach($product as $row){
                    $id_product = $row['product_code'];
                    $product_name  = $row['product_name'];
                    $qty_per_unit = $row['quantity_per_unit'];
                    $price = $row['list_price'];

                    echo "<tr>";
                    echo "<td>".$id_product."</td>";
                    echo "<td>".$product_name."</td>";
                    echo "<td>".$qty_per_unit."</td>";
                    echo "<td>".$price."</td>";
                    echo "<tr>";
                }
            ?>
        </tbody>
    </table>
</div>

<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>