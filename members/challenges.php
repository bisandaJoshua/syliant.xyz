<?php
session_start();
require('../app/app_main.php');

// make sure only logged in users can see this page
verify_authentication();

// instantiate the data set. 
$data_set = [
    'title' => 'Syliant Security',
    'heading' => 'Challenge Catalogue',
    'user_mail' => '',
    'status' => ''
];

// grab the user id of the currently logged in user from the session tracker.
$user_id = $_SESSION['tracker'];

// use the user id to getuser details from the db
$user = Data::get_user($user_id);

// store the user's email address in the data set.
// this will be used to ensure users cannot click to open challenges 
// they have already solved.
$data_set['user_mail'] = $user->user_email;

/**
 * this portion of the code is used to perform searches in the db for 
 * specific challenges based on the keywords entered in the db
 */
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