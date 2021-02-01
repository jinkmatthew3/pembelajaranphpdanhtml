<!DOCTYPE html>
<html>
<head>
    <?php
        echo $js;
        echo $css;
    ?>
    <title>Week 13</title>
</head>
<body>
    <?php
        echo $header;?>
        <div class="row" style="margin-top : 100px;">
            <div class="col-md-12"> <?php echo $crud['output']; ?> </div>
        </div>
    <?php
        echo $footer;
    ?>
</body>
</html>