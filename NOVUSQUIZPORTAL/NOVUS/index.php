<?php
error_reporting(0);
function __autoload($class)
{
    require_once "classes/$class.php";
}


if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    $reg_no=$_POST['reg_no'];
    $email=$_POST['email'];
    $department=$_POST['department'];

    if(empty($name) || empty($email) || empty($reg_no) || empty($department))
    {
        $empty="empty";
        header("location: index.php?empty=$empty");
    }
    else if(!filter_var($email,FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$email) )
    {

        header("location: index.php?error=$name");
    }
    else if(!filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        header("location: index.php?erroremail=$email");
    }
    else
    {
        $fields=[
            'name'=> $name,
            'reg_no' => $reg_no,
            'email'=> $email,
            'department'=> $department
        ];


        //email sending ends
        $student=new Student();
        $student->insert($fields);
    }


}
?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/index.css">
    <title>Quiz Regisgration Novus</title>
    <style>

    </style>
</head>
<body>

<h1 class="heading">REGISTER</h1>
    <div class="container">

        <!--STARTS: Login form-->

        <div class="login-form">
            <?php

            if($_GET['empty'])
            {
                echo "<p>All fields are mandatory.</p>";
            }
            if($_GET['erroremail'])
            {
                echo "<p>Invalid Email : Please try again</p>";
            }
            if($_GET['error'])
            {
                echo "<p>Something went wrong Try again</p>";
            }
            if($_GET['errorsendmail'])
            {
                echo "<p>Something went wrong Try again</p>";
            }

            ?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" placeholder="Your full name">
                </div>

                <div class="form-group">
                    <label for="reg_no">Registration Number</label>
                    <input type="text" name="reg_no" placeholder="Your Registration Number">
                </div>

                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="text" name="email" placeholder="Your email">

                </div>

                <div class="form-group">
                    <label for="department">Department</label>
                    <input type="text" name="department" placeholder="Ex : CSE">
                </div>
                <button type="submit" name="submit">Register</button>
            </form>
        </div>

        <!-- STARTS: description about quest-->

        <div class="description">
            <h1 class="heading-2">THE QUEST</h1>
            <div class="quest_details">
                The Quest is a online quiz competition while is going
                to be held on 24 august 2109 organized by NOVUS.
                The Quest is a online quiz competition while is going
                to be held on 24 august 2109 organized by NOVUS.
                The Quest is a online quiz competition while is going
                to be held on 24 august 2109 organized by NOVUS.
            </div>
        </div>
    </div>
</body>







<!--
//Email sending
        require 'phpmail/PHPMailerAutoload.php';

        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);


        //Server settings
        // Enable verbose debug output
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;


        // Enable SMTP authentication
        $mail->Username   = 'WMAIL';          // SMTP username
        $mail->Password   = 'ABC';                        // SMTP password
        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port       =587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('EMAILID', 'NAME');
        $mail->addAddress($email);



        $mail->isHTML(true);
        $mail->Subject = 'Tuanishstore Signup';

        $mail->Body= '
            <div class="wrapper" style="position:relative;font-family:arial;width:100%;background-color: #262334;">
                <h1 align="center" style="color:white">Welcome To Novus</h1>
                <div class="Message" style="position:relative;padding:20px;color:white">
                    Hello, <b></b><br/>
                    You have been registered successfully for novus quest.

                </div>
            </div>
        ';
        if ($mail->send())
        {

        }
        else {

        }
-->