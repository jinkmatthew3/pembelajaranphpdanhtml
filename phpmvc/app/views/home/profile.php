<div class="container">
    <div class="row">
        <div class="col-4">
            <div class="col-lg-6">
                <?php Flasher::flash(); ?>
            </div>
            <h3> <?= $data['profile']['fName'] ?> <?= $data['profile']['lName'] ?> Profile </h3>
            <img src="<?= BASEURL ?>/img/<?= $data['profile']['photo']?>" width='200px' height='200px'> 
            <ul>
                <li> Email : <?= $data['profile']['email'] ?> </li>
                <li> Gender   : <?= $data['profile']['gender'] ?> </li>
            <ul>
            <a class="btn btn-warning" href="<?= BASEURL ?>/home/edit_profile/">Edit Profile</a>
            </div>
            <div class="col-4">
                <form action="<?= BASEURL ?>/home/post2" method="post">
                    <input type="text" name="status">
                    <button class="btn btn-primary"type="submit">Post</button>
                </form>
                <?php foreach( $data['status'] as $status ) : ?> 
                    <ul>
                        <li><?= $status['fName'] . ' ' . $status['lName'] ?></li>
                        <li><?= $status['status']?></li>
                        <li><?= $status['status_time'] ?></li>
                    </ul>
                <?php endforeach; ?>
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
