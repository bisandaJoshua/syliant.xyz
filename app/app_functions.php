<?php
/**
 * This is the main functions file. It contains functions that are used 
 * throughout the app for the sake of functionality such as redirecting users.
 */

function redirect_user($url) {
    header("Location: $url");
    die();
}

function render_page($page_name, $data_model = '') {
    global $data_set;
    require(APP_PATH . "_renders/layout.render.php");
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

function authentication_check() {
    // was: is_user_authenticated
    return isset($_SESSION['logged_in_user']);
}

function verify_authentication() {
    // was ensure_user_is_authenticated
    if (!authentication_check()) {
      redirect('../login.php');
    }
}