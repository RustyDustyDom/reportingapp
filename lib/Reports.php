<?php
class Reports
{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // Get all reports

    public function getUsers()
    {
        $this->db->querry("SELECT  profile_name, views.profile_id as id, SUM(views) as viewsc
        FROM profiles
        LEFT JOIN views
        ON profiles.profile_id = views.profile_id
        GROUP BY profiles.profile_name");

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

    public function viewSum($profile_id)
    {
        $this->db->querry('SELECT  SUM(views) as viewsc
        FROM profiles
        LEFT JOIN views
        ON views.profile_id = profiles.profile_id
        WHERE views.profile_id = :profile_id
        ORDER BY profile_name ASC');

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

  
    // THIS funtion should serve us with every month per user data the querry is correct for one month
    // I wanted to get all months from Jan to Dec by utilizing an array trough a foreach loop
    // And as the optional paramater i declared $id which is the user profile_id

    public function getPersonDistinctMonthly($id)
    {
        $id = $id;
        $date = array(
            1,2,3,4,5,6,7,8,9,10,11,12
        );
        foreach($date as $month){
            $this->db->querry('SELECT  profile_name, sum(views) as viewsm
            FROM profiles
            LEFT JOIN views
            ON profiles.profile_id = views.profile_id
            WHERE MONTH(date) = :month AND WHERE profiles.profile_id = ;id
         ');

        $this->db->bind(':month', $month);
        $this->db->bind(':id', $id);

          // Assign the row
          $row = $this->db->single();

          return $row;
          print_r($row);
        }
    }



}
