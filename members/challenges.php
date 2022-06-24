<?php
session_start();
require('../app/app.php');

ensure_user_is_authenticated();

$view_bag = [
    'title' => 'Syliant Security',
    'heading' => 'Challenge Catalogue',
    'user_mail' => '',
    'status' => ''
];


$user_id = $_SESSION['tracker'];
$user = Data::get_user($user_id);
$view_bag['user_mail'] = $user->user_email;


if (isset($_GET['search'])){
    // a search has been initiated.
    $user_search = sanitize($_GET['search_query']);
    $results = Data::search_challenges($user_search);

    $view_bag['heading'] = "Search results for <i>$user_search</i>";
    $challenges = $results;

} else {
    $challenges = Data::get_challenges();
}

view('members/challenges', $challenges);