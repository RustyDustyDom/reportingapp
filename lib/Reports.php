<?php
class Reports
{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // Get all reports

    public function getMonthly()
    {
        $this->db->querry("SELECT *
        FROM profiles
        LEFT JOIN views
        ON views.profile_id = profiles.profile_id
        ORDER BY profile_name ASC");

        //Assign the results SET
        $results = $this->db->resultsSet();

        return $results;
    }


    //Get a report

    public function getPersonRecord($profile_id)
    {
        $this->db->querry('SELECT *
        FROM profiles
        WHERE profile_id = :profile_id');

        $this->db->bind(':profile_id', $profile_id);

        // Assign the row
        $row = $this->db->single();

        return $row;
    }

    public function getPersonMonthly($profile_id)
    {
        $this->db->querry('SELECT *
        FROM views RIGHT JOIN profiles
        ON views.profile_id = profiles.profile_id
        WHERE profiles.profile_id = :profile_id
        ORDER BY date ASC
         ');

        $this->db->bind(':profile_id', $profile_id);

        // Assign the row
        $results = $this->db->resultsSet();

        return $results;
    }
}
