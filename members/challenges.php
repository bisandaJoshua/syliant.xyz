<?php
session_start();
require('../app/app.php');

ensure_user_is_authenticated();

$data_set = [
    'title' => 'Syliant Security',
    'heading' => 'Challenge Catalogue',
    'user_mail' => '',
    'status' => ''
];


$user_id = $_SESSION['tracker'];
$user = Data::get_user($user_id);
$data_set['user_mail'] = $user->user_email;


if (isset($_GET['search'])){
    // a search has been initiated.

    // sanitize the search query and remove unwanted characters
    $user_search = sanitize($_GET['search_query']);

    // run the search
    $results = Data::search_challenges($user_search);

    // alter the page heading to reflect that a search took place
    $data_set['heading'] = "Search results for <i>$user_search</i>";

    // store the search results.
    $challenges = $results;

} else {
    // no search was initiated, just a get request for the challenges page, 
    // simply grab all challenges and display them on the page.
    $challenges = Data::get_challenges();
}

// render the challenges page, with the challenges obtained.
render_page('members/challenges', $challenges);