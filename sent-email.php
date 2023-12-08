<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHPMailer MultiAttachment Email</title>
    <link rel="stylesheet" href="email.css">
</head>

<body>
    <?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $msg = $_POST['msg'];
        $file[] = $_POST['file'];


        //Load Composer's autoloader
        require 'vendor/autoload.php';

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host = '';                     //Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   //Enable SMTP authentication
            $mail->Username = '';                     //SMTP username
            $mail->Password = '';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
            //Recipients
            $mail->setFrom('', '');
            $mail->addAddress("$email", $name);     //Add a recipient
    

            //Attachments
            for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
                $mail->addAttachment($_FILES['file']['tmp_name'][$i], $_FILES['file']['name'][$i]);    //Optional name
            }

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = "$subject";
            $mail->Body = "$msg";

            $mail->send();
            echo "<div class='success'>Message Has Been Sent!</div>";
        } catch (Exception $e) {
            echo "<div class='alart'>Message could not be Sent!</div>";
        }
    }
    ?>
    
    <div class="container">
        <h2 class="section-title">Contact</h2>

        <div class="contact__container bd-grid">
            <form action="" method="post" enctype="multipart/form-data" class="contact__form">
                <input type="text" name="name" placeholder="Enter Name" class="contact__input" autocomplete="name">
                <input type="email" name="email" placeholder="Enter Email" class="contact__input" autocomplete="email">
                <input type="text" name="subject" placeholder="Enter Subject" class="contact__input"
                    autocomplete="subject">
                <textarea cols="0" rows="10" name="msg" placeholder="Write Message Here"
                    class="contact__input"></textarea>
                <input type="file" id="file" name="file[]" class="contact__input" multiple="multiple">
                <input type="submit" name="submit" value="Submit" class="contact__button button">
            </form>
        </div>


    </div>

</body>

</html>