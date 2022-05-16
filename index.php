<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>End discrimination against autism</title>
    <link rel="shortcut icon" href="End_discrimination.png">
</head>

<body>
    <?php
    // Checks if form has been submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        function post_captcha($user_response)
        {
            $fields_string = '';
            $fields = array(
                'secret' => '6Lc6KPUfAAAAAKRiMWbxzwZaiyN0BEpOggs0CNZg',
                'response' => $user_response
            );
            foreach ($fields as $key => $value)
                $fields_string .= $key . '=' . $value . '&';
            $fields_string = rtrim($fields_string, '&');

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
            curl_setopt($ch, CURLOPT_POST, count($fields));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

            $result = curl_exec($ch);
            curl_close($ch);

            return json_decode($result, true);
        }

        // Call the function post_captcha
        $res = post_captcha($_POST['g-recaptcha-response']);

        if (!$res['success']) {
            // What happens when the CAPTCHA wasn't checked
            echo '<p>Please go back and make sure you check the security CAPTCHA box.</p><br>';
        } else {
            // If CAPTCHA is successfully completed...

            // Paste mail function or whatever else you want to happen here!
            echo '<br><p>CAPTCHA was completed successfully!</p><br>';
        }
    } else { ?>

        <!-- FORM GOES HERE -->




        <script src="https://www.google.com/recaptcha/api.js" async defer></script>



        <form action="?" method="POST">
            <div class="g-recaptcha" data-sitekey="6Lc6KPUfAAAAAOAVEXUaiKQKGLoJD791aEFvpxQG"></div>
            <br />
            <input type="submit" value="Submit">
        </form>




    <?php } ?>

</body>

</html>