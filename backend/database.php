<?php
//Using PHP Scripts to create database
class createDatabase{
    public $servername;
    public $password;
    public $username;
    public $dbname;
    public $tablename;
    public $con;

    public function __construct(
        $tablename='ProductTable',
        $dbname='FemiShopDatabase',
        $servername='localhost',
        $username='root',
        $password=''
    ){
        $this->dbname=$dbname;
        $this->tablename=$tablename;
        $this->servername=$servername;
        $this->username=$username;
        $this->password=$password;
        //create connection
        $this->con=mysqli_connect($servername,$username,$password);
        if(!$this->con){
            die('Connection Failed to Database: '.mysqli_connect_error());
        }

            //Query to Create Dataabase
        $sql="CREATE DATABASE IF NOT EXISTS $dbname";
        if(mysqli_query($this->con,$sql)){
            $this->con=mysqli_connect($servername,$username,$password,$dbname);

            //Create new Table
            $sql="CREATE TABLE IF NOT EXISTS $tablename
            (id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(25) NOT NULL,
            price FLOAT,
            image VARCHAR(100)
            );";

            if(!mysqli_query($this->con,$sql)){
                echo 'Error Creating Table: '.mysqli_error($this->con);
            } 
        } else{
            return false;
        }

    }
    
    public function getData(){
        $sql="SELECT * FROM $this->tablename";

        $res=mysqli_query($this->con,$sql);

        if(mysqli_num_rows($res)>0){
            return $res;
        }
    }  



}
?>