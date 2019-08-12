<?php
    class admin extends dbh
    {

        public function selectAll($email,$password)
        {


            $sql='SELECT * FROM admin WHERE email=:email AND password=:password ';
            $run=$this->connect()->prepare($sql);
            $run->bindValue(":email",$email);
            $run->bindValue(":password",$password);
            $run->execute();
            $row=$run->rowCount();


            if($row>0)
            {
                session_start();
                $_SESSION['email']=$email;
                header("location: index.php");
            }
        }


        public function selectStudent()
        {
            $sql="SELECT * FROM students";
            $run=$this->connect()->query($sql);
            $total=$run->rowCount();


            if ($total>0)
            {
                while($row=$run->fetch())
                {
                    $data[]=$row;
                }
                return $data;

            }
        }

        public function selectTotal()
        {
            $sql="SELECT * FROM students";
            $run=$this->connect()->query($sql);
            $total=$run->rowCount();
            return $total;

            
        }
    }
?>