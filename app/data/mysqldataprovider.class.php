<?php

class MySqlDataProvider extends DataProvider {
    public function get_challenges() {
        return $this->query_challenges('SELECT * FROM challenges_tb');
    }

    public function get_posts() {
        return $this->query_posts('SELECT * FROM posts_tb');
    }

    public function authenticate_user($email, $password) {
        $db = $this->connect();

        if ($db == null) {
            return;
        }

        $sql = 'SELECT * FROM users_tb WHERE user_email = :email AND user_password = :user_password';
        $smt = $db->prepare($sql);

        $smt->execute([
            ':email' => $email,
            ':user_password' => $password
        ]);

        $data = $smt->fetchAll(PDO::FETCH_CLASS, 'User');

        $smt = null;
        $db = null;

        if (empty($data)) {
            return;
        }

        

        return $data[0];
    }

    public function get_users() {
        return $this->query_users('SELECT * FROM users_tb');
    }

    /**
     * This function grabs all the information about a single user 
     * from the database using the user's id, preferrably obtained 
     * through a query string. 
     */
    public function get_user($user_id) {
        // the function begins by connecting to the database.
        $db = $this->connect();

        if ($db == null) {
            return; // if the connection fails, return nothing.
        }

        // if the connection succeeds, grab all the columns from the users table
        // based on the id obtained from the query string.
        $sql = 'SELECT * FROM users_tb WHERE id = :id';
        $smt = $db->prepare($sql);

        $smt->execute([
            ':id' => $id,
        ]);

        $data = $smt->fetchAll(PDO::FETCH_CLASS, 'User');

        $smt = null;
        $db = null;

        if (empty($data)) {
            return;
        }

        

        return $data[0];
    }

    /** 
     * This function registers a new user into the database. 
     * for security, teachers will be added manually as they have access
     * to more advanced functionality. 
     */
    public function register_user($fn, $ln, $bio, $email, $acc_type, $school, $points, $password, $country){
        // uses a prepared statement to insert all the values into the database.
        $this->execute(
            'INSERT INTO users_tb (user_fn, user_ln, user_bio, user_email, user_account_type, user_school, user_points, user_password, user_country) VALUES (:fn, :ln, :bio, :email, :account_type, :school, :points, :user_password, :country)',
            [
                ':fn' => $fn,
                ':ln' => $ln,
                ':bio' => $bio,
                ':email' => $email,
                ':account_type' => $acc_type,
                ':school' => $school,
                ':points' => $points,
                ':user_password' => $password,
                ':country' => $country
            ]
        );
    }
    
    public function get_challenge($id) {
        $db = $this->connect();

        if ($db == null) {
            return;
        }

        $sql = 'SELECT * FROM challenges_tb WHERE id = :id';
        $smt = $db->prepare($sql);

        $smt->execute([
            ':id' => $id,
        ]);

        $data = $smt->fetchAll(PDO::FETCH_CLASS, 'Challenge');

        $smt = null;
        $db = null;

        if (empty($data)) {
            return;
        }

        

        return $data[0];
    }

    public function get_post($id) {
        $db = $this->connect();

        if ($db == null) {
            return;
        }

        $sql = 'SELECT * FROM posts_tb WHERE id = :id';
        $smt = $db->prepare($sql);

        $smt->execute([
            ':id' => $id,
        ]);

        $data = $smt->fetchAll(PDO::FETCH_CLASS, 'Post');

        $smt = null;
        $db = null;

        if (empty($data)) {
            return;
        }

        

        return $data[0];
    }
    
    public function search_challenges($challenge_keyword) {
        return $this->query_challenges(
            'SELECT * FROM challenges_tb WHERE challenge_title LIKE :search OR challenge_description LIKE :search',
            [':search' => '%'.$challenge_keyword.'%']
        );
    }
    
    public function add_challenge($title, $category, $description, $points, $solution, $date, $resource, $hint) {
        $this->execute(
            'INSERT INTO challenges_tb (challenge_title, challenge_category, challenge_description, challenge_points, challenge_soln, challenge_date, challenge_resource_url, challenge_hint) VALUES (:title, :category, :ch_description, :points, :soln, :ch_date, :ch_resource_url, :ch_hint)',
            [
                ':title' => $title,
                ':category' => $category,
                ':ch_description' => $description,
                ':points' => $points,
                ':soln' => $solution,
                ':ch_date' => $date,
                ':ch_resource_url' => $resource,
                ':ch_hint' => $hint
            ]
        );
    }
    
    public function update_challenge($original_title, $new_title, $category, $description, $points, $solution, $date, $resource, $hint) {
        $this->execute(
            'UPDATE challenges_tb SET challenge_title = :title, challenge_category = :category, challenge_description = :ch_description, challenge_points = :points, challenge_soln = :soln, challenge_date = :ch_date, challenge_resource_url = :ch_resource_url, challenge_hint = :ch_hint WHERE id = :id',
            [
                ':title' => $title,
                ':category' => $category,
                ':ch_description' => $description,
                ':points' => $points,
                ':soln' => $solution,
                ':ch_date' => $date,
                ':ch_resource_url' => $resource,
                ':ch_hint' => $hint
            ]
        );
    }
    
    public function delete_challenge($id) {
        $this->execute(
            'DELETE FROM challenges_tb WHERE id = :id',
            [':id' => $id]
        );
    }

    private function query_challenges($sql, $sql_parms = []) {
        $db = $this->connect();

        if ($db == null) {
            return [];
        }

        $query = null;

        if (empty($sql_parms)) {
            $query = $db->query($sql);
        } else {
            $query = $db->prepare($sql);
            $query->execute($sql_parms);
        }

        $data = $query->fetchAll(PDO::FETCH_CLASS, 'Challenge');

        $query = null;
        $db = null;

        return $data;
    }

    private function query_posts($sql, $sql_parms = []) {
        $db = $this->connect();

        if ($db == null) {
            return [];
        }

        $query = null;

        if (empty($sql_parms)) {
            $query = $db->query($sql);
        } else {
            $query = $db->prepare($sql);
            $query->execute($sql_parms);
        }

        $data = $query->fetchAll(PDO::FETCH_CLASS, 'Post');

        $query = null;
        $db = null;

        return $data;
    }

    private function query_users($sql, $sql_parms = []) {
        $db = $this->connect();

        if ($db == null) {
            return [];
        }

        $query = null;

        if (empty($sql_parms)) {
            $query = $db->query($sql);
        } else {
            $query = $db->prepare($sql);
            $query->execute($sql_parms);
        }

        $data = $query->fetchAll(PDO::FETCH_CLASS, 'User');

        $query = null;
        $db = null;

        return $data;
    }

    private function execute($sql, $sql_parms) {
        $db = $this->connect();

        if ($db == null) {
            return;
        }

        $smt = $db->prepare($sql);

        $smt->execute($sql_parms);

        $smt = null;
        $db = null;
    }

    private function connect() {
        try {
            return new PDO($this->source, CONFIG['db_user'], CONFIG['db_password']);
        } catch (PDOException $e) {
            return null;
        }
    }

    
}