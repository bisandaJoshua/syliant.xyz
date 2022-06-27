<?php

class MySqlDataProvider extends DataProvider {
    public function get_challenges() {
        return $this->query_challenges('SELECT * FROM challenges_tb ORDER BY challenge_date DESC');
    }

    public function get_posts() {
        return $this->query_posts('SELECT * FROM posts_tb');
    }

    public function get_tutorials() {
        return $this->query_tutorials('SELECT * FROM tutorials_tb ORDER BY tutorial_date DESC');
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
        $sql = 'SELECT * FROM users_tb WHERE user_id = :id';
        $smt = $db->prepare($sql);

        $smt->execute([
            ':id' => $user_id,
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

        $sql = 'SELECT * FROM challenges_tb WHERE challenge_id = :id';
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
    
    public function get_tutorial($id) {
        $db = $this->connect();

        if ($db == null) {
            return;
        }

        $sql = 'SELECT * FROM tutorials_tb WHERE tutorial_id = :id';
        $smt = $db->prepare($sql);

        $smt->execute([
            ':id' => $id,
        ]);

        $data = $smt->fetchAll(PDO::FETCH_CLASS, 'Tutorial');

        $smt = null;
        $db = null;

        if (empty($data)) {
            return;
        }

        

        return $data[0];
    }

    public function search_challenges($challenge_keyword) {
        return $this->query_challenges(
            'SELECT * FROM challenges_tb WHERE challenge_category LIKE :search OR challenge_description LIKE :search',
            [':search' => '%'.$challenge_keyword.'%']
        );
    }

    public function add_solver($challenge_id, $solver_email) {
        $this->execute(
            'UPDATE challenges_tb SET challenge_solvers = :solver WHERE challenge_id = :challenge_id',
            [
                ':solver' => $solver_email . ',',
                ':challenge_id' => $challenge_id
            ]
        );
    }

    public function assign_points($user_id, $points) {
        $this->execute(
            'UPDATE users_tb SET user_points = :points WHERE user_id = :user_id',
            [
                ':points' => $points,
                ':user_id' => $user_id
            ]
        );
    }
    
    public function add_challenge($title, $category, $description, $points, $solution, $date, $resource, $hint, $owner) {
        $this->execute(
            'INSERT INTO challenges_tb (challenge_title, challenge_category, challenge_description, challenge_points, challenge_soln, challenge_date, challenge_resource_url, challenge_hint, challenge_owner) VALUES (:title, :category, :ch_description, :points, :soln, :ch_date, :ch_resource_url, :ch_hint, :ch_owner)',
            [
                ':title' => $title,
                ':category' => $category,
                ':ch_description' => $description,
                ':points' => $points,
                ':soln' => $solution,
                ':ch_date' => $date,
                ':ch_resource_url' => $resource,
                ':ch_hint' => $hint,
                ':ch_owner' => $owner
            ]
        );
    }

    public function add_tutorial($title, $category, $description, $owner, $resource_url, $date){
        $this->execute(
            'INSERT INTO tutorials_tb (tutorial_title, tutorial_category, tutorial_description, tutorial_owner, tutorial_resource_url, tutorial_date) VALUES (:tutorial_title, :tutorial_category, :tutorial_description, :tutorial_owner, :tutorial_resource_url, :tutorial_date)',
            [
                ':tutorial_title' => $title,
                ':tutorial_category' => $category,
                ':tutorial_description' => $description,
                ':tutorial_owner' => $owner,
                ':tutorial_resource_url' => $resource_url,
                ':tutorial_date' => $date
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
            'DELETE FROM challenges_tb WHERE challenge_id = :id',
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

    private function query_tutorials($sql, $sql_parms = []) {
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

        $data = $query->fetchAll(PDO::FETCH_CLASS, 'Tutorial');

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