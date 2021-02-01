<nav class="navbar navbar-light bg-light justify-content-between">
  <a class="navbar-brand">Welcome <?= $_SESSION['username'] ?></a>
  <a href="<?= BASEURL ?>/home">Home</a>
  <a href="<?= BASEURL ?>/home/logout">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
  </a>
</nav>