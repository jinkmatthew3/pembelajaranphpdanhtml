<script> console.dir(<?= $data['profile'] ?>);</script>
<div class="container">
    <div class="row">
        <div class="col-4">
        <h3> <?= $data['profile']['fName'] ?> <?= $data['profile']['lName'] ?> Profile </h3>
        <img src="<?= BASEURL ?>/img/<?= $data['profile']['photo']?>">
        <ul>
            <li> Email : <?= $data['profile']['email'] ?> </li>
            <li> Gender   : <?= $data['profile']['gender'] ?> </li>
        <ul>
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