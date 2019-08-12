<?php
    class dbh
    {
        protected function connect()
        {
            try{
                $host='localhost';
                $dbname='novus';
                $user='root';
                $password='1230';

                $dsn="mysql: host=$host;dbname=$dbname";

                $pdo=new PDO($dsn,$user,$password);
                return $pdo;
            }
            catch(PDOexception $e)
            {
                echo "Connection failed".$e->getMessage();
            }
        }
    }


