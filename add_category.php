<?php
// initialize session
ob_start();
session_start();
session_regenerate_id();

// include required file
require_once 'init.php';

// validate session
if (!isset($_SESSION['UserEmail'])) {
    redirect_user();
}

// validate post param
if (filter_input(INPUT_POST, 'cat_name', FILTER_SANITIZE_SPECIAL_CHARS)) {

    $cat_name = filter_input(INPUT_POST, 'cat_name', FILTER_SANITIZE_SPECIAL_CHARS);
    // delete the record from DB
    get_data(ADD_CATEGORY, [$cat_name]);
}
go_back();