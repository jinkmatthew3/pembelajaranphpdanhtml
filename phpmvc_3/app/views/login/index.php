<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col">
        1 of 2
        </div>
        <div class="col">
            <div class="row">
                <form action="<?= BASEURL ?>/login/loginuser" method="post" enctype="multipart/form-data">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Enter Your Username" name="username" id="username">
                    </div>
                    <div class="col">
                        <input type="password" class="form-control" placeholder="Enter Your Password" name="password" id="password">
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary" id="lgin">Log In</button>
                    </div>
                </form>
                <a href="<?= BASEURL; ?>/register"><button class="btn btn-success" id="regis">Register</button></a>
            </div>
        </div>
    </div>
</div>
