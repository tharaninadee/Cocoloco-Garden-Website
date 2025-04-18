<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name =$_POST["name"];
    $email =$_POST["email"];
    $catergoryname = $_POST["catergoryname"];
    $buffetname = $_POST["buffetname"];
    $num_packages = $_POST["num_packages"];
    $to ="nipunimihi91@gmail.com";
    $headers = "From $email";
    if(mail($to,$name,$headers)){
        echo"Email Sent";
    }else{
        echo"Email sending failed";
    }
}


?>


