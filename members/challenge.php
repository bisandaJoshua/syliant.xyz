<?php
session_start();
require('../app/app.php');

ensure_user_is_authenticated();

$data_set = [
    'title' => 'Syliant Security',
    'heading' => '',
    'status' => ''
];

// instantiate the challenge ID
$chid = '';

// listen for incoming GET requests.
/**
 * these requests are what determine which challenge is displayed to the user
 * they are determined by the challenge ID.
 */
if (is_get()) {
    $chid = filter_input(INPUT_GET, 'chid', FILTER_VALIDATE_INT);
    $ans = '';
    if (isset($_GET['ans'])){
        $ans = filter_input(INPUT_GET, 'ans', FILTER_VALIDATE_INT);
        $data_set['status'] = 'Wrong answer, try again.';
    }

    if (empty($chid) || $chid < 1) {
        // if the challenge id is not present, show a 404
        render_page('not_found');
        die();
    }

    $challenge = Data::get_challenge($chid); // grab the whole challenge from the db

    if ($challenge === false) {
        // if the challenge does not exist in the db, show a 404
        render_page('not_found');
        die();
    }

    // TODO: run some checks to make sure someone cant just type the url for a challenge
    // and earn extra points

    render_page('members/challenge', $challenge);
}

// listen for incoming submissions.
if ( is_post() ){
    $user_flag = sanitize($_POST['user_flag']);

    if (empty($user_flag)){
        $user_flag = 'empty';
    }

    $challenge_id = filter_input(INPUT_POST, 'challenge_id', FILTER_VALIDATE_INT);
    $ch = Data::get_challenge($challenge_id);
    $sol = $ch->challenge_soln;

    // verify whether the flag is correct
    if ($sol== $user_flag) {
        //assign points to the user and add the user to list of solvers.
        // grab users points
        $current_user_id = $_SESSION['tracker'];
        $current_user = Data::get_user($current_user_id);
        $current_points = $current_user->user_points;
        $new_points = $ch->challenge_points + $current_points;

        Data::assign_points($current_user_id, $new_points);
        // proceed to add the user to list of solvers
        $solver = $current_user->user_email;
        // get list of current solvers
        $current_solvers = $ch->challenge_solvers;
        $new_solvers = $current_solvers . ', ' . $solver;

        // add challenger to list of solvers
        Data::add_solver($challenge_id, $new_solvers);
        redirect_user("congrats.php");
    } else {
        redirect_user("challenge.php?chid=$challenge_id&ans=0");
    }

}