<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #20948B;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">FASHMAWO</a>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url('Home/index')?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url('About/index')?>">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url('Contact/index')?>">Contact <span class="sr-only">(current)</span></a>
        </li>
      </ul>
      <form class="navbar-form navbar-left" action="/action_page.php">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search" name="search">
          <div class="input-group-btn">
            <button class="btn btn-default" type="submit">
              <i class="fa fa-search"></i>
            </button>
          </div>
        </div>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="fa fa-cart"></span></a></li>
        <li><a href="#"><span class="fa fa-user"></span> Sign Up / Log In</a></li>
      </ul>
    </div>
</nav>