<?php
require '../assets/setup/db.inc.php';
session_start();

function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

if (isset($_POST['title']) && isset($_POST['name']) && isset($_POST['clinic_name']) && isset($_POST['state'])) {
    $title = $_POST['title'];
    $name = $_POST['name'];
    $clinic_name = $_POST['clinic_name'];
    $state = $_POST['state'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $user_id = $_SESSION['id'];
    $location = get_client_ip();

    $sql = "INSERT INTO leads (user_id, title, name, clinic_name, state, mobile, email, location) 
                VALUES (?,?,?,?,?,?,?,?)";
    $stmt = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "ssssssss", $user_id, $title, $name, $clinic_name, $state, $mobile, $email, $location);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
    }
}
header( 'location: /pharma/home');

