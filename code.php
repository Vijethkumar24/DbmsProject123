<?php
session_start();
require 'dbcon.php';

if (isset($_POST['delete_customer'])) {
    $customer_id = mysqli_real_escape_string($con, $_POST['delete_customer']);

    $query = "DELETE FROM customer WHERE id='$customer_id' ";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Customer Deleted Successfully";
        header("Location:index.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Customer Not Deleted";
        header("Location:index.php");
        exit(0);
    }
}

if (isset($_POST['update_customer'])) {
    $customer_id = mysqli_real_escape_string($con, $_POST['customer_id']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $adress = mysqli_real_escape_string($con, $_POST['adress']);
    $city = mysqli_real_escape_string($con, $_POST['city']);
    $query = "UPDATE customer SET name='$name', email='$email', phone='$phone', adress='$adress', city='$city' WHERE id='$customer_id' ";
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        $_SESSION['message'] = "Customer Updated Successfully";
        header("Location: index.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Customer Not Updated";
        header("Location: index.php");
        exit(0);
    }

}


if (isset($_POST['save_customer'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $adress = mysqli_real_escape_string($con, $_POST['adress']);
    $city = mysqli_real_escape_string($con, $_POST['city']);
    $query = "INSERT INTO customer (name,email,phone,adress,city) VALUES ('$name','$email','$phone','$adress','$city')";

    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        $_SESSION['message'] = "Customer Created Successfully";
        header("Location: customer-create.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Customer Not Created";
        header("Location: customer-create.php");
        exit(0);
    }
}

/*------------------------------------------Disributor Queries----------------------------------------------*/


if (isset($_POST['delete_distributor'])) {
    $distributor_id = mysqli_real_escape_string($con, $_POST['delete_distributor']);

    $query = "DELETE FROM distributor_detail WHERE id='$distributor_id' ";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Distributor Deleted Successfully";
        header("Location:distributor_details.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Distributor Not Deleted";
        header("Location:distributor_details.php");
        exit(0);
    }
}

if (isset($_POST['update_distributor'])) {
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $adress = mysqli_real_escape_string($con, $_POST['adress']);
    $city = mysqli_real_escape_string($con, $_POST['city']);
    $pin = mysqli_real_escape_string($con, $_POST['pin']);
    $m_no = mysqli_real_escape_string($con, $_POST['m_no']);
    $e_id = mysqli_real_escape_string($con, $_POST['e_id']);
    $statuss = mysqli_real_escape_string($con, $_POST['statuss']);

    $query = "UPDATE distributor_detail SET name='$name', adress='$adress', city='$city', pin='$pin', m_no='$m_no' ,e_id='$e_id',statuss='$statuss'WHERE id='$id' ";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Distributor Updated Successfully";
        header("Location: distributor_details.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Distributor Not Updated";
        header("Location:distributor_details.php");
        exit(0);
    }

}


if (isset($_POST['save_distributor'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $adress = mysqli_real_escape_string($con, $_POST['adress']);
    $city = mysqli_real_escape_string($con, $_POST['city']);
    $pin = mysqli_real_escape_string($con, $_POST['pin']);
    $m_no = mysqli_real_escape_string($con, $_POST['m_no']);
    $e_id = mysqli_real_escape_string($con, $_POST['e_id']);
    $status = mysqli_real_escape_string($con, $_POST['statuss']);
    $query = "INSERT INTO distributor_detail (name,adress,city,pin,m_no,e_id,statuss) VALUES ('$name','$adress','$city','$pin','$m_no','$e_id','$status')";

    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        $_SESSION['message'] = "Distributor Created Successfully";
        header("Location: distributor_details.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Distributor Not Created";
        header("Location: distributor_details.php");
        exit(0);
    }
}
 if (isset($_GET['c_phone']))
 {
    $cphone = mysqli_real_escape_string($con, $_post['cphone']);
        $_SESSION['message'] = " $cphone Order Placed Successfully";
        header("Location:order-details.php");
        exit(0);
 }

if (isset($_POST['save_order'])) {
    $cphone = $_['phone'];
    $amount = mysqli_real_escape_string($con, $_POST['amount']);
    $weightt = mysqli_real_escape_string($con, $_POST['weightt']);
    $no_of_Cylinder = mysqli_real_escape_string($con, $_POST['no_of_Cylinder']);
    $Bdate = mysqli_real_escape_string($con, $_POST['Bdate']);
    $Ddate = mysqli_real_escape_string($con, $_POST['Ddate']);
    $query = "UPDATE cylinder SET amount='$amount', weightt='$weightt', no_of_Cylinder='$no_of_Cylinder', Bdate='$Bdate' ,Ddate='$Ddate',WHERE weightt='36' ";
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        $_SESSION['message'] = " Order Placed Successfully";
        header("Location:order-details.php");
        exit(0);
    } else {

        $_SESSION['message'] = " Order Not placed ";
        header("Location: cylinderbooking.php");
        exit(0);
    }
}



if (isset($_POST['Book_customer'])) {
    $phone = mysqli_real_escape_string($con, $_POST['Book_customer']);
    $query = exec(`Booking`);
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Cylinder Booked Successfully";
        header("Location:index.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Cylinder not Booked";

        header("Location:index.php");
        exit(0);
    }
}




?>