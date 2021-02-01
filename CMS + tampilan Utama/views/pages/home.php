<!DOCTYPE html>
<html>
<head>
	<?php 	
			echo $js;
			echo $css;
	 ?>
	<title>Week 10</title>
</head>
<body>
    <div>NAVBARNYA MEI YA RON</div>
    <div class="container">
        <div class="col-sm-2 btn-group">
            <button class="row navkanan" style="vertical-align:middle"><span>Button1</span></button>
            <button class="row navkanan" style="vertical-align:middle"><span>Button2</span></button>
            <button class="row navkanan" style="vertical-align:middle"><span>Button3</span></button>
            <button class="row navkanan" style="vertical-align:middle"><span>Button4</span></button>
            <button class="row navkanan" style="vertical-align:middle"><span>Button5</span></button>
            <button class="row navkanan" style="vertical-align:middle"><span>Button6</span></button>
            <button class="row navkanan" style="vertical-align:middle"><span>Button7</span></button>
            <button class="row navkanan" style="vertical-align:middle"><span>Button8</span></button>
            <button class="row navkanan" style="vertical-align:middle"><span>Button9</span></button>
        </div>
        <div class="col-sm-10">
            <div style="text-align: center; padding:35px; padding-top: 0px;"><H1>WOMAN</H1></div>
            <div>
                <div class="col-md-3 tampilanbarang">
                    <img src="https://5.imimg.com/data5/IW/BW/MY-8481883/white-t-shirt-500x500.jpg" class="imgbarang">
                    <p>
                        NAMA BAJUNYA NIH <br>
                        Rp. 5 juta rupiah 
                    </p>

                </div>
                <div class="col-md-3 tampilanbarang">
                    <img src="https://5.imimg.com/data5/IW/BW/MY-8481883/white-t-shirt-500x500.jpg" class="imgbarang">
                    <p>
                        NAMA BAJUNYA NIH <br>
                        Rp. 5 juta rupiah 
                    </p>

                </div>
                <div class="col-md-3 tampilanbarang">
                    <img src="https://5.imimg.com/data5/IW/BW/MY-8481883/white-t-shirt-500x500.jpg" class="imgbarang">
                    <p>
                        NAMA BAJUNYA NIH <br>
                        Rp. 5 juta rupiah 
                    </p>

                </div>
                <div class="col-md-3 tampilanbarang" >
                    <img src="https://5.imimg.com/data5/IW/BW/MY-8481883/white-t-shirt-500x500.jpg" class="imgbarang">
                    <p>
                        NAMA BAJUNYA NIH <br>
                        Rp. 5 juta rupiah 
                    </p>

                </div>
            </div>
            <div style="margin: 0px;">
                <div class="col-md-3 tampilanbarang">
                    <img src="https://5.imimg.com/data5/IW/BW/MY-8481883/white-t-shirt-500x500.jpg" class="imgbarang">
                    <p>
                        NAMA BAJUNYA NIH <br>
                        Rp. 5 juta rupiah 
                    </p>

                </div>
                <div class="col-md-3 tampilanbarang">
                    <img src="https://5.imimg.com/data5/IW/BW/MY-8481883/white-t-shirt-500x500.jpg" class="imgbarang">
                    <p>
                        NAMA BAJUNYA NIH <br>
                        Rp. 5 juta rupiah 
                    </p>

                </div>
                <div class="col-md-3 tampilanbarang">
                    <img src="https://5.imimg.com/data5/IW/BW/MY-8481883/white-t-shirt-500x500.jpg" class="imgbarang">
                    <p>
                        NAMA BAJUNYA NIH <br>
                        Rp. 5 juta rupiah 
                    </p>

                </div>
                <div class="col-md-3 tampilanbarang">
                    <img src="https://5.imimg.com/data5/IW/BW/MY-8481883/white-t-shirt-500x500.jpg"class="imgbarang">
                    <p>
                        NAMA BAJUNYA NIH <br>
                        Rp. 5 juta rupiah 
                    </p>

                </div>

            </div>
            <div class="nextprev">
                <button id="btnPrev">Prev</button>
                <button id="btnNext">Next</button>
            </div>
        </div>
    </div>
    <div>==============================================================================================================================================</div>
    <div class="container">
        <div class="col-sm-2">
            <button class="row navkanan" style="vertical-align:middle"><span>Barang</span></button>
            <button class="row navkanan" style="vertical-align:middle"><span>Customer</span></button>
            <button class="row navkanan" style="vertical-align:middle"><span>Report</span></button>
        </div>
        <div class="col-sm-10">
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
    <div>==============================================================================================================================================</div>
    <div>
        
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#tablesaya').DataTable();
        });
        $('#btnNewProduct').click(function(){
            let move="<?php echo base_url('index.php/AddBarang/insert') ?>";
            window.location.href = move;
        });
    </script>   
    <style type="text/css">
        .navkanan{
            /*border-style: solid;
            padding:20px; 
            text-align: center;*/
            background-color: #4CAF50; /* Green */
                  width: 120%;
                  color: white;
                  padding: 20px 35px;
                  text-align: center;
                  text-decoration: none;
                  display: inline-block;
                  font-size: 16px;
                  /*border: 2px solid black;*/
        }       
        .navkanan span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.navkanan span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}
.navkanan:hover{
    background-color: #199F50;
}
.navkanan:hover span {
  padding-right: 25px;
}

.navkanan:hover span:after {
  opacity: 1;
  right: 0;
}
        .btn-group .navkanan:not(:last-child) {
          border-bottom: none; /* Prevent double borders */
        }

       
        .tampilanbarang{
            /*border-style: solid; */
            margin-bottom: 25px;
            text-align: center;
        }
        .imgbarang{
            height: 150px; 
            width: 150px;
        }
        .nextprev{
            text-align: center;
        }
    </style>
</body>
</html>