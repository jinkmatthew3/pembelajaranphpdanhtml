<div class="container">
    <div class="col-sm-2 btn-group">
        <button class="row navkanan" style="vertical-align:middle"><span>MAN</span></button>
        <button class="row navkanan" style="vertical-align:middle"><span>NEW ARRIVAL</span></button>
        <button class="row navkanan" style="vertical-align:middle"><span>ALL PRODUCTS</span></button>
        <button class="row navkanan" style="vertical-align:middle"><span>SHIRT</span></button>
        <button class="row navkanan" style="vertical-align:middle"><span>T-SHIRT</span></button>
        <button class="row navkanan" style="vertical-align:middle"><span>SHORT</span></button>
        <button class="row navkanan" style="vertical-align:middle"><span>LONGPANTS</span></button>
        <button class="row navkanan" style="vertical-align:middle"><span>SHOES</span></button>
        <button class="row navkanan" style="vertical-align:middle"><span>ACCESSORIES</span></button>
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