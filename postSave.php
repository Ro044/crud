<?php
require_once 'dbConfig.php';
if (isset($_REQUEST['name'])) {
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $phone = $_REQUEST['phone'];
    $date = $_REQUEST['date'];
    $pin = $_REQUEST['pin'];
    $sql = "INSERT INTO customer (name, email, phone,date,pin)
VALUES ('$name','$email','$phone','$date','$pin')";

    if ($db->query($sql) === TRUE) {
        echo "<script type='text/javascript'>alert('successfully submitted'); 
               window.location='/crud';
               </script>";
    } else {
        echo "<script type='text/javascript'>alert('Server error please try again');
               window.location='/crud';
               </script>";
    }
    $db->close();
} else {
    echo "<script type='text/javascript'>alert('Form fields are added incorrectly'); 
               window.location='/crud';
               </script>";
}