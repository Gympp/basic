<?php

require_once( 'Database.php' );

class User_type extends Database
{
    function __construct ()
    {
        parent::__construct();
    }

    public function user($UserName)
    {
    	$this->db->select('user_type')->from('user')
             ->where(array('user_username' => $UserName));
        return $this->db->get()->row_array();
    }
}