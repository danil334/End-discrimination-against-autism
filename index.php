<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://www.google.com/recaptcha/api.js?render=6Lc6KPUfAAAAAOAVEXUaiKQKGLoJD791aEFvpxQG"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post" action="">
        <input type="hidden" name="token" id="token">
        <button type="submit" name="submit">Send</button>
    </form>
    <script>
        grecaptcha.ready(function() {
            grecaptcha.execute('6Lc6KPUfAAAAAOAVEXUaiKQKGLoJD791aEFvpxQG', {
                action: 'submit'
            }).then(function(token) {
                document.getElementById("token").value = token;
            });
        });
    </script>
</body>

</html>
<?php

if (isset($_POST['submit'])) {
    $request = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Lc6KPUfAAAAAKRiMWbxzwZaiyN0BEpOggs0CNZg&response=" . $_POST['token']);
    $request = json_decode($request);
    if ($request->success == true) {
        if ($request->score >= 0.6) {
            // Do something
        } else {
            echo "error";
        }
    }
}
?>