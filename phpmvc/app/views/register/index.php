<div class="container">
    <div class="col-md-6">
        <form action="<?= BASEURL ?>/register/regis" method="post" enctype="multipart/form-data">
            <h1>Register</h1>
            <div class="form-group">
                <label>First Name</label><br>
                <input type="text" name="fName"><br>
            </div>
            <div class="form-group">
                <label>Last Name</label><br>
                <input type="text" name="lName"><br>
            </div>
            <div class="form-group">
                <label>Email</label><br>
                <input type="email" name="email"><br>
            </div>
            <div class="form-group">
                <label>Username</label><br>
                <input type="text" name="username" required><br>
            </div>
            <div class="form-group">
                <label>Password</label><br>
                <input type="Password" name="password" required><br>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Gender</label><br>
                <select class="form-control" id="exampleFormControlSelect1" name="gender">
                <option value="M">Male</option>
                <option value="F">Female</option>
                </select>
            </div>
            <div class="form-group">
                <label>Photos</label><br>
                <input type="file" name="photo"><br><br>
            </div>
            <button type="submit" value="Register">Register</button><br>
        </form>
    </div>
</div>