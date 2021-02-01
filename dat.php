<!DOCTYPE html>
<html>
    <head>
        <title>
            XSS
        </title>
    </head>
    <body>
        <form method="post" action="welcome.php">
            <input type="text" name="input" style="width: 500px;">
            <input type="submit" name="submit" value="submit">
        </form>
    </body>
</html>