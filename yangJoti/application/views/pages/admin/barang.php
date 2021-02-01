<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="col-xl-2">
                <button class="align-middle"><span>Barang</span></button>
                <button class="align-middle"><span>Customer</span></button>
                <button class="align-middle"><span>Report</span></button>
            </div>
            <div class="col-xl-10">
                <div style="text-align: center; padding:35px;"><h1> Barang </h1>
                </div>
                <div style="float: right;" class="col-md-12">
                    <button id="btnNewProduct" class="btn btn-primary float-right"><i class="glyphicon glyphicon-plus-sign"></i>&nbsp;&nbsp;Barang</button>
                </div>

                <div> 
                    <table border="1" style="width: 100%; text-align:center;" id="tablesaya" class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Barang</th>
                                <th>Harga Barang</th>
                                <th>Stock</th>
                                <th>Gender</th>
                                <th>Category</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach ($product as $row) {
                                $item_id=$row['item_id'];
                                $name=$row['name'];
                                $price=$row['price'];
                                $stock=$row['stock'];
                                $gender=$row['gender']; 
                                $category=$row['category'];   
                                $description=$row['description'];

                                echo "<tr>";
                                echo "<td>".$item_id."</td>";
                                echo "<td>".$name."</td>";
                                echo "<td>".$price."</td>";
                                echo "<td>".$stock."</td>";
                                echo "<td>".$gender."</td>";
                                echo "<td>".$category."</td>";
                                echo "<td>".$description."</td>";
                                echo "</tr>";
                            }



                            if(isset($_GET['statsimpan'])) {
                                if($_GET['statsimpan']==1) {
                                    echo "<script>alert('Simpan sukses');</script>";
                                } else {
                                    echo "Simpan Gagal";
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>