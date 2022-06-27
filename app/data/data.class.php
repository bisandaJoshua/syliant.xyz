<?php

require('dataprovider.class.php');


class Data {
    static private $ds;
    static public function initialize(DataProvider $data_provider) {
        return self::$ds = $data_provider;
    }

    static public function get_users() {    
        return self::$ds->get_users();
    }

    static public function get_posts(){
        return self::$ds->get_posts();
    }

    static public function get_tutorials(){
        return self::$ds->get_tutorials();
    }

    static public function get_challenges(){
        return self::$ds->get_challenges();
    }

    static public function assign_points($user_id, $points){
        return self::$ds->assign_points($user_id, $points);
    }

    static public function add_solver($challenge_id, $solver_email){
        return self::$ds->add_solver($challenge_id, $solver_email);
    }

    static public function register_user($fn, $ln, $bio, $email, $acc_type, $school, $points, $password, $country){
        return self::$ds->register_user($fn, $ln, $bio, $email, $acc_type, $school, $points, $password, $country);
    }
    
    static public function get_user($user_id) {
        return self::$ds->get_user($user_id);
    }

    static public function get_post($id){
        return self::$ds->get_post($id);
    }

    static public function get_challenge($id){
        return self::$ds->get_challenge($id);
    }

    static public function get_tutorial($id){
        return self::$ds->get_tutorial($id);
    }
    
    static public function search_challenges($challenge_keyword) {
        return self::$ds->search_challenges($challenge_keyword);
    }
    
    static public function add_challenge($title, $category, $description, $points, $solution, $date, $resource, $hint, $owner) {
        return self::$ds->add_challenge($title, $category, $description, $points, $solution, $date, $resource, $hint, $owner);
    }

    static public function add_tutorial($title, $category, $description, $owner, $resource_url, $date) {
        return self::$ds->add_tutorial($title, $category, $description, $owner, $resource_url, $date);
    }
    
    static public function update_challenge($original_title, $new_title, $category, $description, $points, $solution, $date, $resource, $hint) {
        return self::$ds->update_challenge($original_title, $new_title, $category, $description, $points, $solution, $date, $resource, $hint);
    }
    
    static public function delete_challenge($id) {
        return self::$ds->delete_challenge($id);
    }

    static public function authenticate_user($email, $password){
        return self::$ds->authenticate_user($email, $password);
    }
}
