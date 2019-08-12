<?php
    session_start();

    if(!isset($_SESSION['email']))
    {
        header("location: login.php");
        exit();
    }
    else
    {
        function __autoload($class)
        {
            require_once "classes/$class.php";
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
    <title>The Quest Registration</title>

</head>

<body>
    <?php
        $totalStudent=new admin;
        $total=$totalStudent->selectTotal();

    ?>

    <div class="container">
        <p style="color:#c8430d;background:#fff;padding:5px; width:auto">We have total <?php echo $total;?>  registration</p>
        <div class="student-table">
            <table class="table-responsive" border="1" >
                <thead>
                    <tr>

                        <th>S NO</th>
                        <th>Reg No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Department</th>
                    </tr>
                </thead>

                <tbody>
                <?php
                $student=new Admin();
                $data=$student->selectStudent();
                $i=1;
                    foreach ($data as $rows)
                    {

                        echo "
                        <tr>
                            <td>".$i."</td>
                            <td>" . $rows['reg_no'] . "</td>
                            <td>" . $rows['name'] . "</td>
                            <td>" . $rows['email'] . "</td>
                            <td>" . $rows['department'] . "</td>
                        </tr>";
                    $i++;

                }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <h1 class="heading">NOVUS</h1>
</body>
