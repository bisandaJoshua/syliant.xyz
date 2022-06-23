<?php

require('challenge.class.php');
require('user.class.php');
require('post.class.php');

class DataProvider {
    function __construct($source) {
        $this->source = $source;
    }

    public function get_users() {
        
    }

    public function get_challenges(){

    }

    public function get_posts(){

    }

    public function get_challenge($id){

    }

    public function get_post($id){

    }
    
    public function get_user($user_id) {
        
    }
    
    public function search_challenges($challenge_keyword) {
            
    }
    
    public function add_challenge($title, $category, $description, $points, $solution, $date, $resource, $hint, $owner) {
        
    }
    
    public function update_challenge($original_title, $new_title, $category, $description, $points, $solution, $date, $resource, $hint) {
        
    }
    
    public function delete_challenge($id) {
        
    }

    public function authenticate_user($email, $password){

    }

    public function register_user($fn, $ln, $bio, $email, $acc_type, $school, $points, $password, $country){

    }
}