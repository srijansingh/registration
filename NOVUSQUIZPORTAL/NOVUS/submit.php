<?php
error_reporting(0);

function __autoload($class)
{
    require_once "classes/$class.php";
}

if(isset($_GET['reg_no']))
{
    $uid=$_GET['reg_no'];
    $student = new Student();
    $result=$student->selectOne($uid);

}
    ?>


    <!DOCTYPE html>
    <html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/index.css">
    <title>Regisgration Done Novus</title>
</head>
<body>

<h1 class="heading">REGISTERED</h1>
<div class="container">

    <!--STARTS: Login form-->

    <div class="login-form">
        <form action="" method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" value="<?php echo $result['name']; ?>" disabled>
            </div>

            <div class="form-group">
                <label for="reg_no">Registration Number</label>
                <input type="text" value="<?php echo $result['email']; ?>" disabled>
            </div>

            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="text" value="<?php echo  $result['reg_no'];?>" disabled>

            </div>

            <div class="form-group">
                <label for="department">Department</label>

                <input type="text" value="<?php echo $result['department']; ?>" disabled>
            </div>

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

<!--Submitted successfully-->
<div class="submit-message">
    <h1 style="font-size:30px;">YAY!!</h1>
    <h3 style="font-size:20px;font-weight:normal;">You has been registered successfully</h3>
</div>
</body>


