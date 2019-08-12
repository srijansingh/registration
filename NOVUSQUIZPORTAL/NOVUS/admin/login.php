<?php

function __autoload($class)
{
    require_once "classes/$class.php";
}

    if(isset($_POST['submit']))
    {
        $email=$_POST['email'];
        $password=$_POST['password'];

        if(empty($email) || empty($password))
        {
            header("location: login.php?error");
        }
        else
        {
            $admin=new Admin();
            $admin->selectAll($email,$password);
        }
    }
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/login.css">
    <title>Login Admin Novus</title>

</head>
<body>

    <h1 class="heading">NOVUS</h1>
    <div class="container">
        <h1>Login Admin</h1>
        <form action="" method="post">

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" placeholder="Enter Email">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Enter Password">
            </div>

            <button type="submit" name="submit">Login</button>
        </form>
    </div>
</body>