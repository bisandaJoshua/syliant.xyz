<?php
/**
 * This is the class for challenges, it contains all the properties 
 * A challenge would have and is used when performing all challenge related queries.
 */

class Challenge {
    public $challenge_id;
    public $challenge_title;
    public $challenge_category;
    public $challenge_description;
    public $challenge_points;
    public $challenge_soln;
    public $challenge_date;
    public $challenge_resource_url;
    public $challenge_hint;
    public $challenge_owner;
    public $challenge_solvers; // track the students who have solved challenges.
}