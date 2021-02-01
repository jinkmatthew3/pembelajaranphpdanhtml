<!DOCTYPE html>
<html>
    <head>
        <title>Google reCAPTCHA Demo</title>
        <script src="https://www.google.com/recaptcha/api.js"></script>
    </head>
    <body>
        <h1>Google reCAPTCHA</h1>
        <form id="comment_form" action="responses.php" method="post">
            <input type="text" name="name" placeholder="Insert your name" size="40"><br><br>
            <div class="g-recaptcha" data-sitekey="6LcbD5MUAAAAAMXNI9VcuYdguAvvg8tWOX3c2EEI" style="margin-bottom: 10px;"></div>
            <input type="submit" name="submit" value="submit"><br><br>
        </form>
    </body>
</html>