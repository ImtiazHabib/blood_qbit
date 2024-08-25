<?php 
 

     $connect = mysqli_connect("localhost","root","","blood_qbit");

     if($connect)
     {
          
     }
     else{

     	die("Database connection failed" . mysqli_error($connect));
     }
     
?>