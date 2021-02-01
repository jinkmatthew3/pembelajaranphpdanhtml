<head>
	<?php echo $css2 ?>
</head>
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

    <script type="text/javascript">
        $(document).ready(function(){
            $('#tablesaya').DataTable();
        });
        $('#btnNewProduct').click(function(){
            let move="<?php echo base_url('index.php/AddBarang/insert') ?>";
            window.location.href = move;
        });
    </script>   
</body>
</html>