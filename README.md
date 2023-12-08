# PHPMailer-MultiAttachment-Email
 PHPMailer-powered web app for sending emails with multiple attachments.
# Sent Email using PHPMailer

![GitHub license](https://img.shields.io/badge/license-MIT-blue.svg)

A simple PHP web application for sending emails using PHPMailer with attachments.

## Overview

This project demonstrates how to set up a basic contact form in PHP that utilizes the PHPMailer library for sending emails. Users can submit their name, email, subject, and message, and even attach files to be included in the email.

## Features

- Sends emails using PHPMailer library.
- Supports multiple file attachments.
- Clean and responsive web interface.

## Usage

1. Clone the repository:

    ```bash
    git clone https://github.com/codermillat/Sent-email-using-PHPmailer.git
    ```

2. Set up your web server (e.g., Apache) to serve the files.

3. Install PHPMailer dependencies using Composer:

    ```bash
    composer install
    ```

4. Configure PHPMailer settings in `index.php`.

5. Open the application in your web browser.

## Installation and Configuration of PHPMailer

Ensure you have [Composer](https://getcomposer.org/) installed.

1. Install PHPMailer using Composer:

    ```bash
    composer require phpmailer/phpmailer
    ```

2. In your PHP file (e.g., `index.php`), include the Composer autoloader and configure PHPMailer:

    ```php
    <?php
    // Load Composer's autoloader
    require 'vendor/autoload.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    // Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    // Your PHPMailer configuration here...
    ?>
    ```

3. Update the PHPMailer settings to match your email server configurations:

    ```php
    // PHPMailer settings
    $mail->Host = 'your-smtp-server.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'your-username';
    $mail->Password = 'your-password';
    $mail->SMTPSecure = 'tls'; // Set to 'ssl' if required by your server
    $mail->Port = 587; // Adjust port based on your server settings
    ```

## License

This project is licensed under the [MIT License](LICENSE).

## Author

MD MILLAT HOSEN (codermillat)

Feel free to fork, modify, and use this project for your needs. If you have any suggestions or improvements, feel free to open an issue or submit a pull request.
