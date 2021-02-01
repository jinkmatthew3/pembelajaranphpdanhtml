<div class="container">
    <div class="row">
        <div class="col-4">
            <a class="btn btn-primary" href="<?= BASEURL ?>/home/profile/?>">Show Profile</a>
        </div>
        <div class="col-4">
            <form action="<?= BASEURL ?>/home/post" method="post">
                <input type="text" name="status">
                <button class="btn btn-primary"type="submit">Post</button>
            </form>
            <?php foreach( $data['status'] as $status ) : ?> 
                <ul>
                    <li class="name"><?= $status['fName'] . ' ' . $status['lName'] ?></li>
                    <li class="status"><?= $status['status']?></li>
                    <li class="status_time"><?= $status['status_time'] ?></li>
                    <!-- <li hidden class="status_id"><?= $status['status_id'] ?></li> -->
                </ul>
                <form action="<?= BASEURL ?>/home/insertComment/<?= $status['status_id'] ?>" method="post">
                    <input type="text" name="comment_chat">
                    <button class="btn btn-primary"type="submit">Comment</button>
                </form>
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
