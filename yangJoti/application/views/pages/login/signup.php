<div class="container">
    <div class="col-md-4">
        
    </div>
    <div class="col-md-6">
        <form action="<?= base_url();?>login/signUpUser" method="POST">
            <div class="form-group row ">
                <label>Name &ensp; </label>
                <input type="text" id="fname" class="form-control" style="width:40%;" placeholder="First Name" name="fName"  required>
                <input type="text" id="lname" class="form-control" style="width:40%;" placeholder="Last Name" name="lName">
            </div>
            <div class="form-group row">
                <label>Email &ensp;</label>
                <input placeholder="someone@mail.com" id="rEmail" class="form-control" type="email" style="width: 60%" name="email" required>
            </div>
            <div class="form-group row">
                <label>Address</label>
                <textarea class="form-control" name="address">
                    
                </textarea>
            </div>
            <div class="form-group row">
                <label>Phone Number &ensp; </label>
                <input type="text" name="phonenumber" class="form-control">
                
            </div>
            <div class="form-group row">
                <label>Password &ensp; &ensp; &ensp; &ensp; &ensp; &ensp;</label>
                <input type="password" id="rpass" class="form-control" style="width: 60%;" name="pass" required>
            </div>
            <div class="form-group row">
                <label>Confirm Password &ensp;</label>
                <input type="password" class="form-control" style="width: 60%;" id="crpass" name="rePass" required>
            </div>
            <div>
                <button type="submit" class="btn bungkus-button" id="registerbtn" style="background-color: grey;border-radius: 7px; color: #fff; font-size: 15px;height:40px; line-height: 1.2;">Sign Up</button>
            </div>
        </form>
    </div>
    <div class="col-md-4">
        
    </div>
</div>