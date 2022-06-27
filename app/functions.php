<?php

function redirect($url) {
    header("Location: $url");
    die();
}

function view($name, $model = '') {
    global $view_bag;
    require(APP_PATH . "views/layout.view.php");
}

function verify_pdf($temp_file_name){
    $file_info = finfo_open(FILEINFO_MIME_TYPE);
    $file_type = finfo_file($file_info, $temp_file_name);

    if ($file_type == "application/pdf"){
        return true;
    } else {
        return false;
    }
    finfo_close($file_info);
}

function is_get() {
    return $_SERVER['REQUEST_METHOD'] === 'GET';
}

function is_post() {
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

function sanitize($value) {
    $temp = filter_var(trim($value), FILTER_SANITIZE_STRING);

    if ($temp === false) {
        return '';
    }

    return $temp;
}

function is_user_authenticated() {
    return isset($_SESSION['logged_in_user']);
}

function ensure_user_is_authenticated() {
    if (!is_user_authenticated()) {
      redirect('../login.php');
    }
}