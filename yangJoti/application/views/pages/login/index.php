<div class="background-login" style="background-image: url('images/login/background.jpg');">
    <div class="bungkus">
        <form class="form-login" action="login/loginuser" method="POST" name="frmLogin" id="frmLogin">
            <span class="form-login-title">
                <strong>Login</strong>
            </span>

            <!-- untuk form -->
            <div class="form-row ">
                    <div class="bungkus-input"> 
                    <label>Email</label>
                    <input type="email" class="form-control etext" name="txtEmail" placeholder="Email" id="logEmail" required>
                    <span class="shadow-form"></span> <!-- buat shadow form-->
                    </div> 
                <div class="bungkus-input"> 
                    <label>password</label>
                    <input type="password" class="form-control etext" name="txtPass" placeholder="Password" id="logPass" required>
                    <span class="shadow-form"></span> <!-- buat shadow form-->
                </div>
                
                <!-- buat button -->
                <div class="container-bungkus-button"> 
                    <button type="submit" class="btn bungkus-button" id="loginBtn" style="background-color: grey;border-radius: 7px; color: #fff; font-size: 20px; line-height: 1.2;">Login</button>
                    <button type="button class="btn bungkus-button" id="signupbtn" style="background-color: grey;border-radius: 7px; color: #fff; font-size: 20px; line-height: 1.2;" onclick="location.href = '<?= site_url() ?>login/signup'">Sign Up</button>
                </div>
            </div>

            <!--  <div style="text-align: center; padding-top: 60px; padding-bottom: 20px;">
                <span class="re">
                    Don't have any account ?
                </span>
            </div> -->

            <!-- buat register -->
            <!-- <div style="text-align: center; padding-top: 70px; padding-bottom: 20px;">
                <button class="btn btn-link" data-toggle="modal" data-target="#modalReg">Register</button>
            </div> -->
        </form>
    </div>
</div>
