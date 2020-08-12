<?php
require 'dbConfig.php';
if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $message='submitted';
    if (isset($_REQUEST['name'])) {
        $name = $_REQUEST['name'];
        $email = $_REQUEST['email'];
        $phone = $_REQUEST['phone'];
        $date = $_REQUEST['date'];
        $pin = $_REQUEST['pin'];
        $sql = "UPDATE customer SET `name`='" . $name . "',`email`='" . $email . "',`phone`='" . $phone . "', 
       `date`='" . $date . "',`pin`='" . $pin . "' WHERE id='" . $id . "'";
    } else {
        $sql = " DELETE FROM `customer` WHERE `id`='" . $id . "' ";
        $message="deleted";
    }

    if (mysqli_query($db, $sql)) {
        echo "<script type='text/javascript'>alert('successfully $message.'); 
               window.location='/crud';
               </script>";
    } else {
        echo "<script type='text/javascript'>alert('Server error please try again');
               window.location='/crud';
               </script>";
    }
} else {
    echo "<script type='text/javascript'>alert('Form fields are added incorrectly');
               window.location='/crud';
               </script>";
}