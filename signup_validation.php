<?php
require_once 'init.php';

if (!empty($_POST["div"])) {
    $div = $_POST["div"];
}

//initialize the var
$valid = 0;
$password = "";
$email='';

if (!empty($_POST["email"])) {

    $email = $_POST["email"];
    $results = get_data(USER_CHECK, [$email]);

    if ($results != 0) {
        $email = "<span style='color: red;'>" . lang('error_email_exist') . "</span>";
    } else if (! filter_var($email, FILTER_VALIDATE_EMAIL) ) {
        $email = "<span style='color: red;'>" . lang('error_email_invalid') . "</span>";
    } else {
        $email = "<span style='color: green;'>" . lang('success_email_valid') . "</span>";
        $valid++;
    }
}
if (!empty($_POST["password"])) {

    $password = $_POST["password"];

    if (!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,25}$/",  $password)) {

        $password = "<span style='color: red;'>" . lang('error_invalid_pass') . "</span>";
    } else {
        $password = "<span style='color: green;'>" . lang('success_valid_pass') . "</span>";
        $valid++;
    }
}
if ($div == "#check_email") {
    echo $email;
} else if ($div == "#valid_pass") {
    echo $password;
}
if ($valid == 2) {
    echo "<script>$('#valid').val('valid');</script>";
}
else{
    echo "<script>$('#valid').val('notvalid');</script>";
}

