<link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/bootstrap.min.css'); ?>">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
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
/*Bootstrap*/

.background-login {
  width: 100%;  
  min-height: 100vh;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
  padding: 15px;
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
  position: relative;
  z-index: 1;
}

.background-login::before {
  content: "";
  display: block;
  position: absolute;
  z-index: -1;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  background: -webkit-linear-gradient(left, rgba(131, 232, 228,0.5), rgba(57, 131, 205,0.5));
  background: -o-linear-gradient(left, rgba(131, 232, 228,0.5), rgba(57, 131, 205,0.5));
  background: -moz-linear-gradient(left, rgba(131, 232, 228,0.5), rgba(57, 131, 205,0.5));
  background: linear-gradient(left, rgba(131, 232, 228,0.5), rgba(57, 131, 205,0.5));
  pointer-events: none;
}

.bungkus {
  width: 390px;
  background: #fff;
  border-radius: 10px;
  overflow: hidden;

  box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
  -moz-box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
  -webkit-box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
  -o-box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
  -ms-box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
  padding-right: 55px;
  padding-top: 80px;
  padding-left: 55px;
  padding-bottom: 30px;
}
.form-login{
  width: 100%;
}

.form-login-title {
  display: block;
  font-family: Source Sans Pro;
  font-size: 30px;
  color: #4b2354;
  line-height: 1.2;
  text-align: center;
  padding-bottom: 37px;
}

.bungkus-input {
  width: 100%;
  position: relative;
  background-color: #fff;
  border-radius: 20px;
  margin-bottom: 20px;
}

.shadow-form {
  display: block;
  position: absolute;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  pointer-events: none;
/*  border-radius: 20px;
  box-shadow: 0 5px 30px 0px rgba(0, 0, 0, 0.1);
  -moz-box-shadow: 0 5px 30px 0px rgba(0, 0, 0, 0.1);
  -webkit-box-shadow: 0 5px 30px 0px rgba(0, 0, 0, 0.1);
  -o-box-shadow: 0 5px 30px 0px rgba(0, 0, 0, 0.1);
  -ms-box-shadow: 0 5px 30px 0px rgba(0, 0, 0, 0.1);

  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
  transition: all 0.4s;*/
}

.etext {
  font-family: Source Sans Pro;
  font-size: 16px;
  color: #4b2354;
  line-height: 1.2;

  display: block;
  width: 100%;
  height: 62px;
  background: transparent;
  padding: 0 20px 0 23px;
}

.container-bungkus-button {
  width: 100%;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
}

.bungkus-button{
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 0 20px;
  min-width: 10px;
  height: 50px;
  margin-right: 5px;
  margin-left: 5px;

  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
  transition: all 0.4s;

  /*box-shadow: 0 10px 30px 0px rgba(22, 166, 118, 1);*/
  /*-moz-box-shadow: 0 10px 30px 0px rgba(22, 166, 118, 1);*/
  /*-webkit-box-shadow: 0 10px 30px 0px rgba(22, 166, 118, 1);*/
  /*-o-box-shadow: 0 10px 30px 0px rgba(22, 166, 118, 1);*/
  /*-ms-box-shadow: 0 10px 30px 0px rgba(22, 166, 118, 1);*/
}

.bungkus-button:hover {
  background-color: #90CD28;
  box-shadow: 0 10px 30px 0px rgba(144, 205, 40, 0.8);
  -moz-box-shadow: 0 10px 30px 0px rgba(144, 205, 40, 0.8);
  -webkit-box-shadow: 0 10px 30px 0px rgba(144, 205, 40, 0.8);
  -o-box-shadow: 0 10px 30px 0px rgba(144, 205, 40, 0.8);
  -ms-box-shadow: 0 10px 30px 0px rgba(144, 205, 40, 0.8);
}

/*buat tombol register*/
.re {
  font-family: SourceSansPro-Regular;
  font-size: 16px;
  line-height: 1.4;
  color: #A4AC96;
}
    </style>