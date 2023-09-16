<?php
session_start();
require 'config.php';

if(isset($_POST['customer_delete']))
{
    $customer_id = mysqli_real_escape_string($con, $_POST['customer_delete']);
    $query = "DELETE FROM customerInfo WHERE customer_id='$customer_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = " Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = " Deleted Unsuccessfully";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['customer_update']))
{
    $customer_id = mysqli_real_escape_string($con, $_POST['id']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $address = mysqli_real_escape_string($con, $_POST['address']);

    $query = "UPDATE customerInfo SET name='$name', email='$email', phone='$phone', address='$address' WHERE customer_id = $customer_id";
    echo $query;
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = " Updated Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = " Updated Unsuccessfully";
        header("Location: index.php");
        exit(0);
    }

}


if(isset($_POST['customer_save']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $address = mysqli_real_escape_string($con, $_POST['address']);

    $query = "INSERT INTO customerInfo (name,email,phone,address) VALUES ('$name','$email','$phone','$address')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = " Created Successfully";
        header("Location: customerAdd.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = " Created unsuccessfully";
        header("Location: customerAdd.php");
        exit(0);
    }
}

?>