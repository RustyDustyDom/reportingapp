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
        ORDER BY date DESC");

        //Assign the results SET
        $results = $this->db->resultsSet();

        return $results;
    }


    //Get a report

    public function getPersonalMonthlyReport($profile_id)
    {
        $this->db->querry('SELECT *
        FROM views RIGHT JOIN profiles
        ON views.profile_id = profiles.profile_id
        WHERE profiles.profile_id = :profile_id
        ORDER BY date DESC
         ');

        $this->db->bind(':profile_id', $profile_id);

        // Assign the row
        $row = $this->db->single();

        return $row;
    }
}
