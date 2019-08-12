<?php


    class student extends dbh
    {

        #SELECT STUDENT INFORMATION




        #INSERT STUDENT INFORMATION

        public function insert($fields)
        {
            $impload=implode(', ',array_keys($fields));
            $imploadPlaceholder=implode(', :',array_keys($fields));

            $sql="INSERT into students($impload) VALUES(:".$imploadPlaceholder.")";
            $run=$this->connect()->prepare($sql);

            foreach($fields as $key=>$value)
            {
                $run->bindValue(':'.$key,$value);
            }
            $executeRun = $run->execute();

            if($executeRun)
            {

                $reg_no=$_POST['reg_no'];
                $link="submit.php?reg_no=$reg_no";

                $html= array(
                    'link'=>htmlentities($link, ENT_QUOTES, 'UTF-8'),
                );

                header("Location: ".$html['link']."");
            }
        }


        /*Display data*/
        public function selectOne($reg_no)
        {
            $sql="SELECT * FROM students WHERE reg_no=:reg_no";
            $run=$this->connect()->prepare($sql);
            $run->bindValue(":reg_no",$reg_no);
            $run->execute();
            $result=$run->fetch(PDO::FETCH_ASSOC);
            return $result;
        }


    }
