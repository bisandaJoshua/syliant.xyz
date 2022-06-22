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
    
    static public function get_user($user_id) {
        return self::$ds->get_user($user_id);
    }
    
    static public function search_challenges($challenge_keyword) {
        return self::$ds->search_challenges($challenge_keyword);
    }
    
    static public function add_term($term, $definition) {
        return self::$ds->add_term($term, $definition);
    }
    
    static public function update_term($original_term, $new_term, $definition) {
        return self::$ds->update_term($original_term, $new_term, $definition);
    }
    
    static public function delete_term($term) {
        return self::$ds->delete_term($term);
    }

    static public function authenticate_user($email, $password){
        return self::$ds->authenticate_user($email, $password);
    }
}
