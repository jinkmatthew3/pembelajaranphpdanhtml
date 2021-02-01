<div class="container">
    <div class="row">
        <div class="col-4">
          <a class="btn btn-primary" href="<?= BASEURL ?>/home/profile/<?= $_SESSION['username'] ?>">Show Profile</a>
        </div>
        <div class="col-4">
        </div>
        <div class="col-4">
            <h1>Friend's List</h1>
            <?php foreach( $data['teman'] as $teman ) : ?>
            <ul>
                <a href="<?= BASEURL ?>/home/friend/<?= $teman['user_id'] ?>"><li><?= $teman['fName'] . ' ' . $teman['lName'] ?></a> <!-- jadi dia bakal kirim ke controller home dan panggil friends dan ke view sesuai dengan idnya -->
            </ul>
            <?php endforeach; ?>
        </div>
    </div>
</div>
