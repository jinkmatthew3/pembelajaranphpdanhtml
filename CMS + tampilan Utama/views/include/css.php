<link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/bootstrap.min.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/dataTables.bootstrap.min.css'); ?>">
<style type="text/css">
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

/*untuk upload-pic.php*/
.container-belakang {
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
  padding: 30px;
  background: #6F8E25;

  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
  position: relative;
  z-index: 1;
}

.container-belakang::before {
  content: "";
  display: block;
  position: absolute;
  z-index: -1;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  background: -webkit-linear-gradient(left, rgba(162, 236, 194,0.5), rgba(57, 131, 205,0.5));
  background: -o-linear-gradient(left, rgba(162, 236, 194, 0.5), rgba(57, 131, 205,0.5));
  background: -moz-linear-gradient(left, rgba(162, 236, 194,0.5), rgba(57, 131, 205,0.5));
  background: linear-gradient(left, rgba(162, 236, 194,0.5), rgba(57, 131, 205,0.5));
  pointer-events: none;
}


.box {
  width: 1170px;
  background: #fff;
  overflow: hidden;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  align-items: stretch;
  border-radius: 10px;
  flex-direction: row-reverse;

}

.upload-pic {
  width: 50%;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  padding: 50px 55px 35px 55px;
}



.pic {
  width: 50%;
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
  position: relative;
  z-index: 1;
  padding: 50px 55px 35px 55px;
}


.kata-select{
  font-family: Poppins-Regular;
  font-size: 20px;
  color: #555555;
  line-height: 1.2;
  text-transform: uppercase;
  letter-spacing: 2px;
  text-align: center;
  padding-bottom: 34px;

  width: 100%;
  display: block;
}

.pic-button{
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 0 0px;
  min-width: 160px;
  height: 50px;
  padding-right: 30px; 
  padding-left: 30px; 
  width: 100%;
}


/*buat home.php*/
.wrapper{
  width: 100%;
  float: left;
  background-color: #F4F4F4;
  /*position: relative;
  background: -webkit-linear-gradient(left, rgba(249, 250, 249,0.5), rgba(252, 253, 252,0.5));
*/
}

.main-section{
  padding-top: 50px;
  float: left;
  width: 100%;
}

.main-section-data{
  float: left;
  width: 100%;
}

.user-data{
  float: left;
  width: 100%;
  background-color: #FEFEFE;
  margin-bottom: 20px;
  border-left: 1px solid #e5e5e5;
  border-right: 1px solid #e5e5e5;
  border-bottom: 1px solid #e5e5e5;
  text-align: center;
}

.user-dte{
  float: left;
  padding-bottom: 30px;
  width: 100%;
  background-color: #65D88C;
  padding-top: 40px;
  background: -webkit-linear-gradient(left, rgba(101, 216, 140,0.5), rgba(21, 99, 118,0.5));

}

.usr-pic {
  width: 200px;
  height: 200px;
  margin: 0 auto;
  margin-bottom: -48px;
}

.usr-pic > img {
  float: none;
  border: 5px solid #fff;
  -webkit-border-radius: 100px;
  -moz-border-radius: 100px;
  -ms-border-radius: 100px;
  -o-border-radius: 100px;
  border-radius: 100px;
  width: 100%;
}

.user-detail {
  float: left;
  width: 100%;
  padding: 43px 0 43px 0;
  background-color: #fff;

}

.user-detail h3 {
  color: #000000;
  font-size: 23px;
  font-weight: 600;
  margin-bottom: 8px;
  text-transform: capitalize;
  padding-bottom: 30px;
  padding-top: 30px;
  font-family: 'EB Garamond', serif;
  background-color: #fff;
}

.user-detail span {
  color: #686868;
  font-size: 14px;
}


.post-topbar {
  float: left;
  width: 100%;
  padding: 20px 20px;
  background-color: #F4F4F4;
  margin-bottom: 30px;
}


.widget {
	float: left;
	width: 100%;
	height: 45%;
	background-color: #FEFEFE;
	border-radius: 10px;
	/*border-left: 1px solid #e4e4e4;
	border-right: 1px solid #e4e4e4;
	border-bottom: 1px solid #e4e4e4;*/
	margin-bottom: 20px;
	/*-webkit-box-shadow: 1px 0px 2px rgba(0,0,0,0.24);
	-moz-box-shadow: 1px 0px 2px rgba(0,0,0,0.24);
	-ms-box-shadow: 1px 0px 2px rgba(0,0,0,0.24);
	-o-box-shadow: 1px 0px 2px rgba(0,0,0,0.24);
	box-shadow: 1px 0px 2px rgba(0,0,0,0.24);*/
}

.widget-about {
	text-align: center;
}

.widget-about img {
	padding-top: 20px;
	padding-bottom: 20px;
	float: none;
	padding-top: 20px;
	border-radius: 50%;
}

.widget-about h3 {
	padding-top: 30px;
	color: #000000;
	font-size: 20px;
	font-weight: 600;
	margin-bottom: 12px;
}

.bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
        .blacky{
            background-color : black;
        }
        .img-fluid{
            max-width: 75%;
            height: 400px;
        }
       </style>