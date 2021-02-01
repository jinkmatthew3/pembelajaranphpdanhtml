<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #20948B;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">FASHMAWO</a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url() ?>home">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
      </ul>
      <form class="navbar-form navbar-left" method="POST" action="<?= base_url() ?>home/searchProduct/">
          <div class="input-group">
             <input type="text" name="txtSearch" class="form-control" placeholder="search...">
             <span class="input-group-btn">
             <button class="btn btn-primary" type="submit" style="border-bottom-left-radius: 0;border-top-left-radius: 0;background-color: #71BEA3; border-color: #71BEA3;"><i class="fas fa-search"></i></button>
           </span>
         </div>
      </form>
      <div class="nav navbar-nav navbar-right" style="padding-left: 20px;">
        <div>
          <button class="btn btn-primary" type="submit" onclick="location.href='<?= base_url() ?>cart'" style="background-color: #71BEA3; border-color: #71BEA3;">
            <i class="fas fa-shopping-cart"></i>
          </button>
        </div>
        <div style="padding-left: 20px">
          <button class="btn btn-primary" type="submit" style="background-color: #71BEA3; border-color: #71BEA3;" onclick="location.href='<?= base_url() ?>login'">
            <i class="fas fa-sign-in-alt"></i>
            Sign In
          </button>
        </div>
      </div>
    </div>
</nav>
